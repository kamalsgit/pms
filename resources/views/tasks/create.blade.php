@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<form method="post" action="/task/create/{{$id}}" name="task" id="employee" ng-hide="showForm">
		{{csrf_field()}}
		 <div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section>
				<h4>Create Task</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>Task Title</label>
			<input type='hidden' name='edit_task' value="@{{edit_task}}">
			<input type='hidden' name='projectID' id="PID" value="{{ $id }}">
			
			<input class="form-control" type="text" name="title" value="" ng-model="task.title" required placeholder="Enter Project Title"/>
			<span class="help-inline" ng-show="task.title.$touched && task.title.$invalid">Required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>Task Description</label>
			<textarea ng-model="task.description" name='description' class="form-control" placeholder="Enter Project Description"></textarea>
			<span class="help-inline" ng-show="task.description.$touched && task.description.$invalid">Required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="task_type">Task type </label>
			<select ng-model="task.task_type" class="form-control" name="task_type" ng-options="tasktype.task_type_id as tasktype.title for tasktype in task_temp" >
			</select>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="priority">Priority </label>
			<select ng-model="task.priority" class="form-control" name="priority" ng-options="priority.priority_id as priority.title for priority in priority_temp" >
			</select>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="assignee">Assignee </label>
			<select ng-model="task.assignee" class="form-control" name="assignee" ng-options="assignee.emp_id as assignee.name for assignee in assignee_temp" >
			</select>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">	
			<label class="control-label" for="start_date">From Date</label>
			<datepicker date-format="d MMMM, y">
			<input class="form-control" name="start_date" ng-model="task.start_date" type="text" placeholder="Select Start Date"/>
			<span class="help-inline" ng-show="task.start_date.$touched && task.start_date.$invalid">Required</span>
			<span ng-show="task.start_date.$error.start_date">Enter Valid Date.</span>
			</datepicker>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">	
			<label class="control-label" for="end_date">To Date</label>
			<datepicker date-format="d MMMM, y">
			<input class="form-control" name="end_date" ng-model="task.end_date" type="text" placeholder="Select End Date"/>
			<span class="help-inline" ng-show="task.end_date.$touched && task.end_date.$invalid">Required</span>
			<span ng-show="task.end_date.$error.end_date">Enter Valid Date.</span>
			</datepicker>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="task_status">Task Status </label>
			<select ng-model="task.task_status" class="form-control" name="task_status" ng-options="status.status_id as status.status_title for status in status_temp" >
			</select>
			</div>
			
			<div class="clearfix"></div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-sm-2">
			<input type="submit" class="button" ng-click="task_save()" value='Save'>
			</div>
			<div class="form-group col-sm-2">
			<input type="button" class="button" ng-click="task_cancel()" value='Cancel'>
			</div>
			</div>
			<div class="clearfix"></div>	
			</div>
		 </div>
		</form>