<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Image as VisionImage;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $imageContent = file_get_contents(storage_path('app/public/' . $i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        // Crea il client
        $imageAnnotator = new ImageAnnotatorClient();
        
        // Crea l'oggetto Image
        $image = new VisionImage();
        $image->setContent($imageContent);
        
        // Crea la feature per Safe Search
        $feature = new Feature();
        $feature->setType(Feature\Type::SAFE_SEARCH_DETECTION);
        
        // Crea la request
        $request = new AnnotateImageRequest();
        $request->setImage($image);
        $request->setFeatures([$feature]);
        
        // Esegui l'annotazione
        $response = $imageAnnotator->batchAnnotateImages([$request]);
        $imageAnnotator->close();

        // Ottieni i risultati
        $annotations = $response->getResponses()[0];
        $safe = $annotations->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $spoof = $safe->getSpoof();
        $medical = $safe->getMedical();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihoodName = [
            'text-secondary bi bi-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
            'text-danger bi bi-dash-circle-fill'
        ];

        $i->adult = $likelihoodName[$adult];
        $i->spoof = $likelihoodName[$spoof];
        $i->medical = $likelihoodName[$medical];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
    }
}