<!-- Layout principale con tema Imperial -->
<x-layout>
    <div class="container pt-5">
        <!-- Header section con titolo decorato -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-white display-4 pt-5">
                 {{ __('ui.register') }}
               </h1>
            </div>
        </div>

        <!-- Form section con styling Imperial -->
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <!-- Form di registrazione con classe personalizzata Imperial -->
                <form method="POST" action="{{ route('register') }}" class="form-dark shadow rounded p-5">
                    @csrf

                    <!-- Campo Nome con styling Imperial -->
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-2"></i>{{ __('ui.name') }}
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('ui.enter_name') }}" required autofocus>
                    </div>

                    <!-- Campo Email con styling Imperial -->
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">
                            <i class="fas fa-envelope me-2"></i>{{ __('ui.email_address_label') }}
                        </label>
                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="{{ __('ui.email_address') }}" required>
                    </div>

                    <!-- Campo Password con styling Imperial -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password:
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('ui.enter_password') }}">
                    </div>

                    <!-- Campo Conferma Password con styling Imperial -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-shield-alt me-2"></i>{{ __('ui.confirm_password') }}
                        </label>
                        <input type="password" class="form-control" id="password_confirmation" 
                               name="password_confirmation" placeholder="{{ __('ui.confirm_password') }}" required>
                    </div>

                    <!-- Pulsante di submit con styling Imperial -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-imperial">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('ui.register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>



<!-- SCRIPT PER SISTEMA DI RINFORZO PASSWORD - PAGINA REGISTER CON TESTI BIANCHI -->
<script>
    // =====================================================
    // SISTEMA DI VALIDAZIONE E RINFORZO PASSWORD
    // =====================================================

    document.addEventListener('DOMContentLoaded', function() {
        // Attende il caricamento completo del DOM prima dell'esecuzione
        // Questo garantisce che tutti gli elementi HTML siano disponibili
        
        // SELEZIONE ELEMENTI DOM NECESSARI
        const passwordInput = document.getElementById('password');              // Campo password principale del form
        const confirmPasswordInput = document.getElementById('password_confirmation'); // Campo conferma password
        const registerForm = document.querySelector('form');                   // Form di registrazione completo
        
        // CONTROLLO SICUREZZA: verifica esistenza campo password
        if (!passwordInput) {
            console.log('Campo password non trovato nel DOM');
            return; // Esce dalla funzione se il campo non esiste per evitare errori
        }
        
        // INIZIALIZZAZIONE SISTEMA COMPLETO
        createPasswordStrengthSystem(); // Crea tutta l'interfaccia di validazione
        
        // REGISTRAZIONE EVENT LISTENERS per interazione utente
        passwordInput.addEventListener('input', handlePasswordInput);           // Ogni carattere digitato
        passwordInput.addEventListener('focus', showPasswordSystem);            // Quando utente clicca nel campo
        passwordInput.addEventListener('blur', hidePasswordSystemIfEmpty);      // Quando utente esce dal campo
        registerForm.addEventListener('submit', validateFormSubmission);        // Prima dell'invio form
        
        // Validazione aggiuntiva per campo conferma password
        if (confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);
        }
        
        // =====================================================
        // CREAZIONE INTERFACCIA SISTEMA RINFORZO PASSWORD
        // =====================================================
        
        function createPasswordStrengthSystem() {
            // Crea contenitore principale per tutto il sistema di validazione
            // Questo diventerà il container per tutti gli elementi di validazione
            const systemContainer = document.createElement('div');
            systemContainer.className = 'password-strength-system';
            systemContainer.id = 'passwordStrengthSystem';
            
            // COSTRUZIONE INTERFACCIA COMPLETA con template literals
            // Usa classi Bootstrap per testi bianchi: text-white, fw-bold, fw-semibold
            systemContainer.innerHTML = `
                <!-- BARRA DI FORZA PASSWORD CON INDICATORE VISIVO -->
                <div class="strength-display-section">
                    <div class="strength-bar-wrapper">
                        <div class="strength-bar-track">
                            <!-- Barra che si riempie proporzionalmente alla forza password -->
                            <div class="strength-bar-fill" id="strengthBarFill"></div>
                        </div>
                        <!-- Testo livello con classe Bootstrap per testo bianco e grassetto -->
                        <div class="strength-level-text text-white fw-bold" id="strengthLevelText">START TYPING PASSWORD</div>
                    </div>
                    <!-- Percentuale forza con testo bianco semi-grassetto -->
                    <div class="strength-percentage text-white fw-semibold" id="strengthPercentage">0%</div>
                </div>
                
                <!-- GRIGLIA REQUISITI PASSWORD CON ICONE DINAMICHE -->
                <div class="requirements-validation-grid" id="requirementsGrid">
                    <!-- Ogni requisito ha ID univoco per aggiornamenti individuali -->
                    <!-- Classe text-white Bootstrap per testo bianco -->
                    <div class="requirement-check requirement-pending" id="req-length">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">At least 8 characters</span>
                    </div>
                    <div class="requirement-check requirement-pending" id="req-uppercase">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">Uppercase letter (A-Z)</span>
                    </div>
                    <div class="requirement-check requirement-pending" id="req-lowercase">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">Lowercase letter (a-z)</span>
                    </div>
                    <div class="requirement-check requirement-pending" id="req-number">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">Number (0-9)</span>
                    </div>
                    <!-- Requisito caratteri speciali che occupa 2 colonne della griglia -->
                    <div class="requirement-check requirement-pending" id="req-special" style="grid-column: span 2;">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">Special character (!@#$%^&*)</span>
                    </div>
                    <!-- Controllo pattern comuni che occupa 2 colonne della griglia -->
                    <div class="requirement-check requirement-pending" id="req-no-common" style="grid-column: span 2;">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">No common patterns (123456, password, etc.)</span>
                    </div>
                </div>
                
                <!-- SEZIONE SUGGERIMENTI INTELLIGENTI PER MIGLIORAMENTO -->
                <div class="password-suggestions-section" id="passwordSuggestions" style="display: none;">
                    <div class="suggestions-header">
                        <!-- Icona lampadina con classe Bootstrap text-warning per colore giallo -->
                        <i class="fas fa-lightbulb text-warning"></i>
                        <!-- Testo bianco con peso medio per header suggerimenti -->
                        <span class="text-white fw-medium">Suggestions to strengthen your password:</span>
                    </div>
                    <!-- Lista dinamica dei suggerimenti -->
                    <div class="suggestions-list text-white" id="suggestionsList"></div>
                </div>
                
                <!-- VALIDAZIONE CONFERMA PASSWORD -->
                <div class="password-match-validation" id="passwordMatchSection" style="display: none;">
                    <div class="requirement-check requirement-pending" id="req-match">
                        <span class="requirement-status-icon">⏳</span>
                        <span class="requirement-description text-white">Passwords match</span>
                    </div>
                </div>
                
                <!-- GENERATORE PASSWORD SICURA -->
                <div class="password-generator-section" id="passwordGenerator">
                    <!-- Bottone con classi Bootstrap: btn, btn-outline-light per bordo bianco -->
                    <button type="button" class="password-generator-btn btn btn-outline-light" id="generatePasswordBtn">
                        <i class="fas fa-magic me-2"></i>
                        <span class="text-white">Generate Strong Password</span>
                    </button>
                    <!-- Sezione display password generata -->
                    <div class="generated-password-display d-flex gap-2 mt-2" id="generatedPasswordDisplay" style="display: none;">
                        <!-- Input readonly con classe Bootstrap form-control -->
                        <input type="text" class="generated-password-field form-control" id="generatedPasswordField" readonly>
                        <!-- Bottone successo Bootstrap per usare password -->
                        <button type="button" class="use-generated-btn btn btn-success" id="useGeneratedBtn">
                            <span class="text-white">Use This</span>
                        </button>
                        <!-- Bottone copia con outline bianco -->
                        <button type="button" class="copy-password-btn btn btn-outline-light" id="copyPasswordBtn">
                            <i class="fas fa-copy text-white"></i>
                        </button>
                    </div>
                </div>
                
                <!-- AREA MESSAGGI DI ERRORE E AVVISI -->
                <div class="validation-messages-area text-white" id="validationMessages"></div>
            `;
            
            // INSERIMENTO nel DOM dopo il campo password
            // appendChild aggiunge il sistema subito dopo il campo password
            passwordInput.parentNode.appendChild(systemContainer);
            
            // INIZIALIZZAZIONE EVENTI GENERATORE PASSWORD
            initializePasswordGenerator();
        }
        
        // =====================================================
        // GESTIONE EVENTI UTENTE E VALIDAZIONE
        // =====================================================
        
        function handlePasswordInput(e) {
            // Funzione principale chiamata ad ogni carattere digitato nella password
            // e.target.value contiene il valore corrente del campo password
            const currentPassword = e.target.value;
            
            // Se il campo è completamente vuoto
            if (currentPassword.length === 0) {
                hidePasswordSystem();    // Nasconde tutto il sistema di validazione
                resetAllValidations();   // Resetta tutti gli stati dei requisiti
                return; // Esce dalla funzione
            }
            
            // Se c'è almeno un carattere nella password
            showPasswordSystem(); // Mostra il sistema di validazione
            performCompletePasswordAnalysis(currentPassword); // Avvia analisi completa
            
            // Se c'è anche del testo nel campo conferma password, valida anche quello
            if (confirmPasswordInput && confirmPasswordInput.value) {
                validatePasswordMatch();
            }
        }
        
        function performCompletePasswordAnalysis(password) {
            // ANALISI COMPLETA DELLA PASSWORD in 4 fasi sequenziali
            
            // FASE 1: Controllo requisiti base (lunghezza, caratteri, pattern)
            const basicRequirements = analyzeBasicRequirements(password);
            
            // FASE 2: Calcolo punteggio di sicurezza complessivo con bonus
            const securityScore = calculateSecurityScore(basicRequirements, password);
            
            // FASE 3: Generazione suggerimenti personalizzati per miglioramenti
            const improvementSuggestions = generatePasswordSuggestions(basicRequirements, password);
            
            // FASE 4: Aggiornamento completo dell'interfaccia grafica
            updatePasswordStrengthDisplay(securityScore);     // Aggiorna barra e percentuale
            updateRequirementsDisplay(basicRequirements);     // Aggiorna lista requisiti con icone
            updateSuggestionsDisplay(improvementSuggestions); // Aggiorna suggerimenti dinamici
            
            // Restituisce oggetto con tutti i dati per uso in altre funzioni
            return { basicRequirements, securityScore, improvementSuggestions };
        }
        
        function analyzeBasicRequirements(password) {
            // ANALISI DETTAGLIATA DEI REQUISITI usando Regular Expressions
            // Ogni test restituisce true/false per il requisito specifico
            return {
                length: password.length >= 8,                                           // Verifica lunghezza minima 8 caratteri
                uppercase: /[A-Z]/.test(password),                                     // Cerca almeno una maiuscola
                lowercase: /[a-z]/.test(password),                                     // Cerca almeno una minuscola
                number: /[0-9]/.test(password),                                        // Cerca almeno un numero
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~`]/.test(password),   // Cerca caratteri speciali
                noCommonPatterns: !detectCommonWeakPatterns(password)                 // Verifica assenza pattern deboli
            };
        }
        
        function detectCommonWeakPatterns(password) {
            // RILEVAMENTO PATTERN DEBOLI COMUNI nelle password
            // Array di espressioni regolari per identificare password deboli
            const weakPatterns = [
                /password/i,        // Parola "password" in qualsiasi combinazione maiuscole/minuscole
                /123456/,          // Sequenze numeriche consecutive semplici
                /qwerty/i,         // Pattern da tastiera QWERTY in qualsiasi caso
                /admin/i,          // Parola "admin" comunemente usata
                /letmein/i,        // Frase comune "let me in"
                /welcome/i,        // Parola di benvenuto comune
                /(.)\1{2,}/,       // Caratteri ripetuti 3 o più volte consecutivamente (aaa, 111, etc.)
                /012345/,          // Altre sequenze numeriche consecutive
                /abcdef/i,         // Sequenze alfabetiche consecutive
                /987654/,          // Sequenze numeriche inverse
                /654321/           // Countdown numerici
            ];
            
            // Restituisce true se trova almeno un pattern debole
            // some() restituisce true se almeno un elemento dell'array soddisfa la condizione
            return weakPatterns.some(pattern => pattern.test(password));
        }
        
        function calculateSecurityScore(requirements, password) {
            // CALCOLO AVANZATO DEL PUNTEGGIO DI SICUREZZA con sistema di bonus
            
            let baseScore = 0;
            const maxBaseScore = 6; // Punteggio massimo base per i 6 requisiti principali
            
            // PUNTEGGIO BASE: conta quanti requisiti base sono soddisfatti
            Object.values(requirements).forEach(isRequirementMet => {
                if (isRequirementMet) baseScore++; // +1 punto per ogni requisito soddisfatto
            });
            
            // SISTEMA DI BONUS AGGIUNTIVI per caratteristiche extra di sicurezza
            let bonusPoints = 0;
            
            // Bonus per lunghezze progressive della password
            if (password.length >= 12) bonusPoints += 0.5;  // Primo bonus per 12+ caratteri
            if (password.length >= 16) bonusPoints += 0.5;  // Secondo bonus per 16+ caratteri
            if (password.length >= 20) bonusPoints += 0.5;  // Terzo bonus per 20+ caratteri
            
            // Bonus per varietà di caratteri speciali
            const specialCharsCount = (password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~`]/g) || []).length;
            if (specialCharsCount >= 2) bonusPoints += 0.3; // Bonus per 2+ caratteri speciali diversi
            
            // Bonus per mix equilibrato di numeri e lettere alternati
            if (/(?=.*[a-zA-Z])(?=.*[0-9])/.test(password) && password.length >= 10) {
                bonusPoints += 0.2; // Bonus per complessità bilanciata
            }
            
            // CALCOLO FINALE del punteggio totale
            const totalScore = baseScore + bonusPoints;
            const percentage = Math.min((totalScore / maxBaseScore) * 100, 100); // Limita a 100%
            
            // DETERMINAZIONE LIVELLO E COLORI basata sulla percentuale
            let level, color, gradient;
            if (percentage < 30) {
                level = 'VERY WEAK';
                color = '#dc3545';  // Rosso Bootstrap
                gradient = 'linear-gradient(90deg, #dc3545, #a71e2a)';
            } else if (percentage < 50) {
                level = 'WEAK';
                color = '#fd7e14';  // Arancione Bootstrap
                gradient = 'linear-gradient(90deg, #fd7e14, #d63384)';
            } else if (percentage < 70) {
                level = 'FAIR';
                color = '#ffc107';  // Giallo Bootstrap
                gradient = 'linear-gradient(90deg, #ffc107, #fd7e14)';
            } else if (percentage < 85) {
                level = 'GOOD';
                color = '#28a745';  // Verde Bootstrap
                gradient = 'linear-gradient(90deg, #28a745, #20c997)';
            } else if (percentage < 95) {
                level = 'STRONG';
                color = '#20c997';  // Verde acqua Bootstrap
                gradient = 'linear-gradient(90deg, #20c997, #17a2b8)';
            } else {
                level = 'EXCELLENT';
                color = '#6f42c1';  // Viola Bootstrap
                gradient = 'linear-gradient(90deg, #6f42c1, #20c997)';
            }
            
            // Restituisce oggetto completo con tutti i dati calcolati
            return {
                totalScore,                          // Punteggio numerico totale
                percentage: Math.round(percentage),  // Percentuale arrotondata
                level,                              // Testo livello di sicurezza
                color,                              // Colore per la UI
                gradient,                           // Gradiente per la barra
                isStrong: percentage >= 80          // Boolean: password considerata forte
            };
        }
        
        function generatePasswordSuggestions(requirements, password) {
            // GENERAZIONE SUGGERIMENTI INTELLIGENTI personalizzati per migliorare la password
            const suggestions = [];
            
            // Suggerimenti basati sui requisiti mancanti
            if (!requirements.length) {
                suggestions.push("Add more characters - aim for at least 12-16 characters");
            }
            
            if (!requirements.uppercase) {
                suggestions.push("Include uppercase letters (A, B, C, etc.)");
            }
            
            if (!requirements.lowercase) {
                suggestions.push("Include lowercase letters (a, b, c, etc.)");
            }
            
            if (!requirements.number) {
                suggestions.push("Add numbers (0-9) for better security");
            }
            
            if (!requirements.special) {
                suggestions.push("Use special characters like !, @, #, $, %, etc.");
            }
            
            if (!requirements.noCommonPatterns) {
                suggestions.push("Avoid common patterns like '123456', 'password', or keyboard sequences");
            }
            
            // Suggerimenti per password di lunghezza insufficiente
            if (password.length < 12) {
                suggestions.push("Consider using a passphrase with multiple words");
            }
            
            // Suggerimenti avanzati per password già discrete ma migliorabili
            if (requirements.length && requirements.uppercase && requirements.lowercase) {
                if (password.length < 16) {
                    suggestions.push("For maximum security, try 16+ characters");
                }
                if (!/[!@#$%^&*]{2,}/.test(password)) {
                    suggestions.push("Use multiple special characters for extra strength");
                }
            }
            
            return suggestions; // Array di stringhe con suggerimenti
        }
        
        // =====================================================
        // AGGIORNAMENTO INTERFACCIA GRAFICA
        // =====================================================
        
        function updatePasswordStrengthDisplay(scoreData) {
            // AGGIORNAMENTO BARRA DI FORZA E INDICATORI NUMERICI
            
            // Selezione elementi DOM da aggiornare
            const barFill = document.getElementById('strengthBarFill');        // Barra che si riempie
            const levelText = document.getElementById('strengthLevelText');    // Testo livello (WEAK, STRONG, etc.)
            const percentageDisplay = document.getElementById('strengthPercentage'); // Percentuale numerica
            
            // Verifica che tutti gli elementi esistano prima di aggiornarli
            if (barFill && levelText && percentageDisplay) {
                // Aggiornamento barra di progresso
                barFill.style.width = scoreData.percentage + '%';    // Larghezza proporzionale al punteggio
                barFill.style.background = scoreData.gradient;       // Gradiente colorato dinamico
                
                // Aggiornamento testo livello - mantiene classe Bootstrap text-white
                levelText.textContent = scoreData.level;             // Testo del livello
                levelText.style.color = scoreData.color;             // Colore dinamico sovrapposto al bianco
                
                // Aggiornamento percentuale - mantiene classe Bootstrap text-white
                percentageDisplay.textContent = scoreData.percentage + '%'; // Percentuale con simbolo %
                percentageDisplay.style.color = scoreData.color;            // Colore coordinato
                
                // Animazione pulsante per feedback visivo sui cambiamenti significativi
                barFill.parentElement.classList.add('strength-updated');
                setTimeout(() => {
                    barFill.parentElement.classList.remove('strength-updated');
                }, 300); // Rimuove classe dopo 300ms
            }
        }
        
        function updateRequirementsDisplay(requirements) {
            // AGGIORNAMENTO LISTA REQUISITI con icone dinamiche e classi CSS
            
            // Mappatura tra ID elementi DOM e stati dei requisiti
            const requirementMapping = {
                'req-length': requirements.length,           // Lunghezza
                'req-uppercase': requirements.uppercase,     // Maiuscole
                'req-lowercase': requirements.lowercase,     // Minuscole
                'req-number': requirements.number,           // Numeri
                'req-special': requirements.special,         // Caratteri speciali
                'req-no-common': requirements.noCommonPatterns // Pattern comuni
            };
            
            // Aggiorna ogni requisito individualmente
            Object.entries(requirementMapping).forEach(([elementId, isMet]) => {
                const element = document.getElementById(elementId);
                if (element) {
                    const icon = element.querySelector('.requirement-status-icon');
                    
                    // Rimuove tutte le classi di stato esistenti per reset pulito
                    element.classList.remove('requirement-pending', 'requirement-met', 'requirement-failed');
                    
                    // Applica nuova classe e icona basata sullo stato del requisito
                    if (isMet) {
                        element.classList.add('requirement-met');    // Classe per requisito soddisfatto
                        icon.textContent = '✅';                     // Icona check verde
                    } else {
                        element.classList.add('requirement-failed'); // Classe per requisito non soddisfatto
                        icon.textContent = '❌';                     // Icona X rossa
                    }
                    
                    // Nota: la classe Bootstrap text-white rimane sempre applicata
                }
            });
        }
        
        function updateSuggestionsDisplay(suggestions) {
            // AGGIORNAMENTO SEZIONE SUGGERIMENTI con contenuto dinamico
            
            const suggestionsSection = document.getElementById('passwordSuggestions');
            const suggestionsList = document.getElementById('suggestionsList');
            
            // Se ci sono suggerimenti da mostrare
            if (suggestions.length > 0) {
                suggestionsSection.style.display = 'block'; // Rende visibile la sezione
                
                // Genera HTML per ogni suggerimento con classi Bootstrap per testo bianco
                suggestionsList.innerHTML = suggestions.map(suggestion => 
                    `<div class="suggestion-item text-white">
                        <i class="fas fa-arrow-right suggestion-arrow text-warning me-2"></i>
                        <span>${suggestion}</span>
                    </div>`
                ).join(''); // join('') unisce tutti gli elementi in una stringa
            } else {
                // Se non ci sono suggerimenti, nasconde la sezione
                suggestionsSection.style.display = 'none';
            }
        }
        
        // =====================================================
        // GENERATORE PASSWORD SICURA
        // =====================================================
        
        function initializePasswordGenerator() {
            // INIZIALIZZAZIONE EVENTI per il generatore automatico di password sicure
            
            // Selezione bottoni del generatore password
            const generateBtn = document.getElementById('generatePasswordBtn');    // Bottone "Generate"
            const useGeneratedBtn = document.getElementById('useGeneratedBtn');    // Bottone "Use This"
            const copyBtn = document.getElementById('copyPasswordBtn');           // Bottone "Copy"
            
            // Aggiunta event listeners solo se gli elementi esistono
            if (generateBtn) {
                generateBtn.addEventListener('click', generateSecurePassword);
            }
            
            if (useGeneratedBtn) {
                useGeneratedBtn.addEventListener('click', useGeneratedPassword);
            }
            
            if (copyBtn) {
                copyBtn.addEventListener('click', copyGeneratedPassword);
            }
        }
        
        function generateSecurePassword() {
            // GENERAZIONE AUTOMATICA di password sicura con tutti i requisiti
            
            // Set di caratteri per ogni categoria
            const lowercase = 'abcdefghijklmnopqrstuvwxyz';           // Lettere minuscole
            const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';           // Lettere maiuscole
            const numbers = '0123456789';                             // Numeri
            const specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';       // Caratteri speciali sicuri
            
            // Combinazione di tutti i caratteri per riempimento casuale
            const allChars = lowercase + uppercase + numbers + specialChars;
            let generatedPassword = '';
            
            // FASE 1: Assicura almeno un carattere di ogni tipo richiesto
            generatedPassword += getRandomChar(lowercase);    // Almeno una minuscola
            generatedPassword += getRandomChar(uppercase);    // Almeno una maiuscola
            generatedPassword += getRandomChar(numbers);      // Almeno un numero
            generatedPassword += getRandomChar(specialChars); // Almeno un carattere speciale
            
            // FASE 2: Completa con caratteri casuali fino a 16 caratteri totali
            for (let i = 4; i < 16; i++) {
                generatedPassword += getRandomChar(allChars); // Carattere casuale da tutti i set
            }
            
            // FASE 3: Mescola tutti i caratteri per evitare pattern prevedibili
            generatedPassword = shuffleString(generatedPassword);
            
            // FASE 4: Mostra la password generata nell'interfaccia
            const display = document.getElementById('generatedPasswordDisplay');
            const field = document.getElementById('generatedPasswordField');
            
            if (display && field) {
                field.value = generatedPassword;           // Inserisce password nel campo
                display.style.display = 'flex';           // Mostra sezione con display flex
            }
        }
        
        function getRandomChar(charSet) {
            // Seleziona un carattere casuale da un set di caratteri
            // Math.random() genera numero tra 0 e 1, moltiplicato per lunghezza set
            return charSet.charAt(Math.floor(Math.random() * charSet.length));
        }
        
        function shuffleString(str) {
            // Mescola casualmente i caratteri di una stringa per eliminare pattern
            return str.split('')                    // Converte stringa in array di caratteri
                     .sort(() => Math.random() - 0.5) // Ordina casualmente (shuffle)
                     .join('');                      // Riconverte in stringa
        }
        
        function useGeneratedPassword() {
            // APPLICA la password generata ai campi del form
            const generatedField = document.getElementById('generatedPasswordField');
            
            if (generatedField && generatedField.value) {
                // Inserisce password generata nel campo principale
                passwordInput.value = generatedField.value;
                
                // Se esiste campo conferma, inserisce la stessa password
                if (confirmPasswordInput) {
                    confirmPasswordInput.value = generatedField.value;
                }
                
                // Trigger manuale degli eventi per attivare la validazione
                passwordInput.dispatchEvent(new Event('input'));
                if (confirmPasswordInput) {
                    confirmPasswordInput.dispatchEvent(new Event('input'));
                }
                
                // Nasconde la sezione del generatore
                document.getElementById('generatedPasswordDisplay').style.display = 'none';
            }
        }
        
        function copyGeneratedPassword() {
            // COPIA la password generata negli appunti del sistema
            const generatedField = document.getElementById('generatedPasswordField');
            
            if (generatedField) {
                generatedField.select();                    // Seleziona tutto il testo
                document.execCommand('copy');               // Comando copia (compatibilità)
                
                // FEEDBACK VISIVO per confermare la copia
                const copyBtn = document.getElementById('copyPasswordBtn');
                const originalText = copyBtn.innerHTML;     // Salva contenuto originale
                
                // Cambia temporaneamente icona e colore
                copyBtn.innerHTML = '<i class="fas fa-check text-white"></i>';
                copyBtn.style.backgroundColor = '#28a745';  // Verde successo
                
                // Ripristina aspetto originale dopo 2 secondi
                setTimeout(() => {
                    copyBtn.innerHTML = originalText;
                    copyBtn.style.backgroundColor = '';
                }, 2000);
            }
        }
        
        // =====================================================
        // VALIDAZIONE CONFERMA PASSWORD
        // =====================================================
        
        function validatePasswordMatch() {
            // CONTROLLO CORRISPONDENZA tra password principale e conferma
            const mainPassword = passwordInput.value;              // Password principale
            const confirmPassword = confirmPasswordInput.value;    // Password di conferma
            const matchSection = document.getElementById('passwordMatchSection');
            const matchRequirement = document.getElementById('req-match');
            
            // Se c'è del testo nel campo conferma
            if (confirmPassword.length > 0) {
                matchSection.style.display = 'block';      // Mostra sezione validazione
                
                const isMatching = mainPassword === confirmPassword; // Confronto esatto
                const icon = matchRequirement.querySelector('.requirement-status-icon');
                
                // Reset classi esistenti
                matchRequirement.classList.remove('requirement-pending', 'requirement-met', 'requirement-failed');
                
                // Applica classe e icona appropriate
                if (isMatching) {
                    matchRequirement.classList.add('requirement-met');  // Password corrispondenti
                    icon.textContent = '✅';                            // Icona successo
                } else {
                    matchRequirement.classList.add('requirement-failed'); // Password diverse
                    icon.textContent = '❌';                              // Icona errore
                }
                
                // Nota: classe Bootstrap text-white sempre mantenuta
            } else {
                // Se campo conferma vuoto, nasconde la validazione
                matchSection.style.display = 'none';
            }
        }
        
        // =====================================================
        // CONTROLLO VISIBILITÀ SISTEMA
        // =====================================================
        
        function showPasswordSystem() {
            // Rende visibile l'intero sistema di validazione password
            const system = document.getElementById('passwordStrengthSystem');
            if (system) {
                system.style.display = 'block'; // Mostra con display block
            }
        }
        
        function hidePasswordSystem() {
            // Nasconde l'intero sistema di validazione password
            const system = document.getElementById('passwordStrengthSystem');
            if (system) {
                system.style.display = 'none'; // Nasconde con display none
            }
        }
        
        function hidePasswordSystemIfEmpty() {
            // Nasconde il sistema solo se il campo password è completamente vuoto
            // Utile quando l'utente clicca fuori dal campo (evento blur)
            if (passwordInput.value.length === 0) {
                hidePasswordSystem(); // Nasconde solo se veramente vuoto
            }
        }
        
        function resetAllValidations() {
            // RESET COMPLETO di tutte le validazioni allo stato iniziale
            const requirements = document.querySelectorAll('.requirement-check');
            
            // Per ogni elemento requisito, resetta lo stato
            requirements.forEach(req => {
                req.classList.remove('requirement-met', 'requirement-failed'); // Rimuove stati success/error
                req.classList.add('requirement-pending');                      // Aggiunge stato pending
                
                const icon = req.querySelector('.requirement-status-icon');
                if (icon) icon.textContent = '⏳'; // Icona orologio per stato attesa
                
                // Nota: le classi Bootstrap text-white rimangono sempre applicate
            });
        }
        
        // =====================================================
        // VALIDAZIONE FINALE AL SUBMIT DEL FORM
        // =====================================================
        
        function validateFormSubmission(e) {
            // VALIDAZIONE COMPLETA PRIMA DELL'INVIO del form di registrazione
            // Questa è l'ultima barriera prima che i dati vengano inviati al server
            
            const password = passwordInput.value;                                    // Password inserita
            const confirmPassword = confirmPasswordInput ? confirmPasswordInput.value : ''; // Conferma password
            
            // Se la password è vuota, lascia che la validazione HTML standard gestisca l'errore
            // required attribute del campo si occuperà di mostrare errore appropriato
            if (password.length === 0) {
                return true; // Permette il submit, HTML validation mostrerà errore
            }
            
            // ESECUZIONE ANALISI COMPLETA della password inserita
            const analysis = performCompletePasswordAnalysis(password);
            const messagesArea = document.getElementById('validationMessages');
            
            // RACCOLTA ERRORI di validazione
            let hasErrors = false;
            let errorMessages = [];
            
            // CONTROLLO 1: Verifica forza della password
            if (!analysis.securityScore.isStrong) {
                hasErrors = true;
                errorMessages.push(`Password too weak (${analysis.securityScore.percentage}% strength). Please create a stronger password.`);
            }
            
            // CONTROLLO 2: Verifica corrispondenza password se campo conferma presente
            if (confirmPassword && password !== confirmPassword) {
                hasErrors = true;
                errorMessages.push('Passwords do not match. Please ensure both fields contain the same password.');
            }
            
            // Se ci sono errori di validazione, BLOCCA L'INVIO del form
            if (hasErrors) {
                e.preventDefault(); // Impedisce l'invio del form al server
                
                showPasswordSystem(); // Assicura che il sistema di validazione sia visibile
                
                // MOSTRA MESSAGGI DI ERRORE dettagliati con classi Bootstrap per testo bianco
                messagesArea.innerHTML = `
                    <div class="validation-error-message alert alert-danger">
                        <strong class="text-white">⚠️ Cannot register with current password:</strong>
                        <ul class="text-white mt-2 mb-0">
                            ${errorMessages.map(msg => `<li class="text-white">${msg}</li>`).join('')}
                        </ul>
                    </div>
                `;
                
                passwordInput.focus(); // Riporta il focus sul campo password per correzione
                
                // AUTO-RIMOZIONE del messaggio di errore dopo 15 secondi
                setTimeout(() => {
                    messagesArea.innerHTML = '';
                }, 15000);
                
                return false; // Conferma esplicita che il submit è stato bloccato
            }
            
            // Se TUTTI I CONTROLLI sono passati con successo
            messagesArea.innerHTML = ''; // Pulisce eventuali messaggi di errore precedenti
            return true; // Permette l'invio del form al server
        }
        
        // =====================================================
        // MESSAGGIO DI INIZIALIZZAZIONE E DEBUG
        // =====================================================
        
        // Log di conferma nell'console del browser per debugging
        // Conferma che tutto il sistema è stato inizializzato correttamente
        console.log('✅ Advanced Password Strengthening System with Bootstrap White Text initialized successfully for Register Page');
        
        // Nota: tutti i testi utilizzano classi Bootstrap per mantenere colore bianco:
        // - text-white: per testo bianco di base
        // - fw-bold: per testo grassetto bianco
        // - fw-semibold: per testo semi-grassetto bianco  
        // - fw-medium: per testo peso medio bianco
        // - btn btn-outline-light: per bottoni con bordo bianco
        // - btn btn-success: per bottoni di successo
        // - alert alert-danger: per messaggi di errore con sfondo rosso
        // - text-warning: per icone gialle (lampadina suggerimenti)
    });
</script>

<!-- CSS AGGIUNTIVO PER FORZARE TESTI BIANCHI E STILI BOOTSTRAP -->
<style>
    /* =====================================================
       FORZATURA TESTI BIANCHI CON !IMPORTANT
       ===================================================== */
    
    /* Mantiene tutti i testi dei requisiti sempre bianchi */
    .requirement-description {
        color: white !important;
    }
    
    /* Mantiene testo livello forza sempre bianco */
    .strength-level-text {
        color: white !important;
    }
    
    /* Mantiene percentuale sempre bianca */
    .strength-percentage {
        color: white !important;
    }
    
    /* Mantiene header suggerimenti sempre bianco */
    .suggestions-header span {
        color: white !important;
    }
    
    /* Bottone generatore password con stili Bootstrap migliorati */
    .password-generator-btn {
        color: white !important;
        border-color: white !important;
        transition: all 0.3s ease;
    }
    
    /* Hover effect per bottone generatore */
    .password-generator-btn:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        border-color: #ffd700 !important; /* Bordo dorato al hover */
    }
    
    /* Singoli suggerimenti sempre bianchi */
    .suggestion-item {
        color: white !important;
        padding: 8px 0;
    }
    
    /* Frecce suggerimenti in colore dorato */
    .suggestion-arrow {
        color: #ffd700 !important;
    }
    
    /* Messaggi di validazione con testo bianco forzato */
    .validation-error-message {
        background-color: rgba(220, 53, 69, 0.15) !important;
        border: 2px solid #dc3545 !important;
        border-radius: 8px !important;
        padding: 20px !important;
        margin-top: 15px !important;
    }
    
    /* Titolo errore in rosso chiaro */
    .validation-error-message strong {
        color: #ff6b6b !important;
    }
    
    /* Lista errori con testo bianco */
    .validation-error-message ul {
        color: white !important;
        margin-bottom: 0 !important;
        padding-left: 20px !important;
    }
    
    /* Singole voci errore bianche */
    .validation-error-message li {
        color: white !important;
        margin-bottom: 8px !important;
    }
    
    /* Campo password generata con stili Bootstrap */
    .generated-password-field {
        background-color: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid #6c757d !important;
        color: white !important;
    }
    
    /* Focus sul campo password generata */
    .generated-password-field:focus {
        background-color: rgba(255, 255, 255, 0.15) !important;
        border-color: #ffd700 !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25) !important;
    }
    
    /* Responsive: su mobile mantiene leggibilità */
    @media (max-width: 768px) {
        .suggestion-item {
            font-size: 14px !important;
        }
        
        .validation-error-message {
            padding: 15px !important;
        }
        
        .strength-level-text {
            font-size: 16px !important;
        }
    }
</style>