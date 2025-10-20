<div class="table-responsive">
    <table class="table" id="seoSettings-table">
        <thead>
            <tr>
                <th>Page</th>
        <th>Title</th>
        <th>Meta Description</th>
        <th>Meta Keywords</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($seoSettings as $key => $seoSetting)
            <tr>
                <td>{{ $seoSetting->page }}</td>
            <td>{{ $seoSetting->title }}</td>
            <td>{{ $seoSetting->meta_description }}</td>
            <td>{{ $seoSetting->meta_keywords }}</td>
                <td>
                    {!! Form::open(['route' => ['seoSettings.destroy', $seoSetting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seoSettings.show', [$seoSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('seoSettings.edit', [$seoSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
