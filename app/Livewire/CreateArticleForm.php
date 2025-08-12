<?php



namespace App\Livewire;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\RemoveFaces;

use App\Jobs\ResizeImage;


class CreateArticleForm extends Component
{

    use WithFileUploads;
    
    #[Validate('required|min:5')]
    public $title;
    
    #[Validate('required|min:10')]
    public $description;
    
    #[Validate('required|numeric')]
    public $price;
    
    #[Validate('required')]
    public $category;
    
    public $article;


    
   public $images =[]; // USER STORY 5
public $temporary_images; // USER STORY 5

public function store()
{
    $this->validate();

    $this->article = Article::create([
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'category_id' => $this->category,
        'user_id' => Auth::id()
    ]);

    if (count($this->images) > 0){
        foreach ($this->images as $image){
            $newFileName = "/articles/{$this->article->id}";
            $storedPath = $image->store($newFileName, 'public');
            $newImage = $this->article->images()->create(['path' => $storedPath]);

            // Corretta dispatch con chain
            dispatch(new RemoveFaces($newImage->id))->chain([
            //new ResizeImage($newImage->path, 300, 300),
            new ResizeImage($storedPath, 300, 300), 
            new GoogleVisionSafeSearch($newImage->id),
            new GoogleVisionLabelImage($newImage->id)
            ]);
        }

        File::deleteDirectory(storage_path('/app/livewire-tmp'));
    }

    session()->flash('success', 'Articolo creato correttamente');
    $this->reset();
}

    public function render()
    {
        return view('livewire.create-article-form');
    }

      public function updatedTemporaryImages()
{
    if ($this->validate([
        'temporary_images.*' => 'image|max:1024',
        'temporary_images' => 'max:6'
    ])) {
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }
}


public function removeImage($key)
{
    if (in_array($key, array_keys($this->images))) {
        unset($this->images[$key]);
    }
}


protected function cleanForm()
{
    $this->title = '';
    $this->description = '';
    $this->category = '';
    $this->price = '';
    $this->images = [];
}
}