
@if (count($errors) > 0)
    <div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (count($errors) > 0)
	<div class="alert alert-warning" ng-show="showErrorAlert">
		<button type="button" class="close" data-ng-click="switchBool('showErrorAlert')" >×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
	</div>
@endif


@if ($errors->has('email')) {
   The Email Field Is Required
}
@endif

@if ($errors->has('password')) {
    The Password Field Is Required
}
@endif