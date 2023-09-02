<iframe src="{{ ($getRecord()->file_path) ? Storage::url($getRecord()->file_path ?? '') : $getRecord()->url }}" width="100%" height="700px" ></iframe>
