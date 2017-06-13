<table class="table table-striped">
    <thead>
    <tr>
        <th>File</th>
        <th>Last edited</th>
    </tr>
    </thead>
    <tbody>
    @forelse($project->versions->last()->files as $file)
        <tr>
            <td>
                @if($file->editable)<a href="#">@endif
                    {{ $file->name }}
                @if($file->editable)</a>@endif
            </td>
            <td>{{ $file->updated_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No files yet</td>
        </tr>
    @endforelse
    </tbody>
</table>
<h1>Upload Python, text or image files.</h1>
{!! Form::open([ 'route' => [ 'files.store', 'version' => $project->versions->last()->id ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'file-upload' ]) !!}
<div>
    <h3>Upload Multiple Files By Click On Box</h3>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    Dropzone.options.fileUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".{{ implode(',.', \App\Models\File::$extensions)  }}"
    };
</script>