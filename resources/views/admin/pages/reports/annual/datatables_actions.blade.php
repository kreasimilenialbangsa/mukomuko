<div class='text-center d-flex justify-content-center'>
    @if(strtotime(date('Y-m-d')) >= strtotime(date('01-'.$month)) && strlen($month) > 4)
        <a href="{{ route('admin.report.annual.show', $month) }}" class='btn btn-primary btn-xs'>
            <i class="fa fa-eye"></i>
        </a>
    @else
        <button class="btn btn-secondary btn-xs" type="button" disabled><i class="fa fa-eye"></i></button>
    @endif
</div>
