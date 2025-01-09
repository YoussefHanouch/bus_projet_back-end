@extends('layouts.app')

@section('title', 'Liste des demandes de carte ')

<style>
    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        height: calc(2.25rem + 2px);
        margin-bottom: 0;
    }

    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: calc(2.25rem + 2px);
        margin: 0;
        opacity: 0;
    }

    .custom-file-input:focus~.custom-file-label {
        border-color: #62A1D9;
        box-shadow: 0 0 0 0.2rem rgba(98, 161, 217, 0.25);
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .lg {
        width: 60px;
        height: 60px;
        transform: rotate(15deg);
        mix-blend-mode: darken;
    }

    .bc {
        background: #62A1D9;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        color: #495057;
        content: "Parcourir";
        background-color: #e9ecef;
        border-left: inherit;
        border-radius: 0 0.25rem 0.25rem 0;
    }
</style>

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: "> <center>{{ __('Télécharger un document de validation') }}</center></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('upload.pdf', $demandeCart) }}" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label for="photo">{{ __('Sélectionnez une photo') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="document_validation" name="document_validation">
                                 <label class="custom-file-label" for="document_validation">{{ __('Choisir une photo') }}</label>
                            </div>
                            @error('document_validation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Envoyer') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the file input and label elements
        const fileInput = document.getElementById('document_validation');
        const fileInputLabel = fileInput.nextElementSibling;

        // Add an event listener for the change event
        fileInput.addEventListener('change', function(event) {
            // Get the name of the selected file
            const fileName = event.target.files[0].name;
            // Update the label with the file name
            fileInputLabel.textContent = fileName;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
