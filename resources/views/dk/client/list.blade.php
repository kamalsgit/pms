@extends('layout.app')

@section('title', 'Clients')

@section('h1title',"Clients")
@section('pageData')

<div class='col-lg-12' ng-controller='dkclientController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">Clients <p><img ng-click="clientadd()" src="image/add_button.png"> <img ng-click="sort('name')" src="image/sort_btn.png"></p></h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="clientsearch" class="form-control" placeholder="Search"/></p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>

			<div class="col-sm-9 text-left content panel panel-default">
				<div class="clientlist" ng-hide="showList">
					<div class="row">
						<div class="col-md-12">
							<div class="fullscreen">
								<span href="#" ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
							</div>
						</div>
						<div class="col-md-12">
							@if(Session::has('message'))
								<div class="alert alert-success alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{Session::get('message') }}
								</div>
							@endif
							@if(Session::has('message-fail'))
								<div class="alert alert-danger alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{Session::get('message-fail') }}
								</div>
							@endif
						</div>
						<div class="col-md-12"></div>
					</div>

					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Name</th>
								<th>Email</th>
								<th>Skype</th>
								<th>Phone Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($clients as $client)
									<tr>
										<td>{{ $client['client_id']}}</td>
										<td>{{ $client['name']}}</td>
										<td>{{ $client['email']}}</td>
										<td>{{ $client['skype']}}</td>
										<td>{{ $client['phone_number']}}</td>
										<td>
											<div id="profile" class="col-md-12">
												<div class="col-md-6">
													<img ng-click="clientedit({{ $client['client_id']}})" src="image/edit.png">
												</div>
												<div class="col-md-6">
													<img ng-click="clientdel({{ $client['client_id']}})" src="image/delete.png">
												</div>
											</div>
										</td>
									</tr>
								@empty
									<tr><td colspan=6>No clients</td></tr>
								@endforelse
						</tbody>
						<tfoot>
							<td colspan='6'>
							{!! $clients->links() !!}
							</td>
						</tfoot>
					</table> 
				</div>
				@include('dk.client.create')
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4 class="header">Online</h4>
			<div class="col-sm-12 sidenav Rsidebar">
				  <div class="well">
					<p>ADS</p>
				  </div>
				  <div class="well">
					<p>ADS</p>
				  </div>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4 class="header">What's New</h4>
			<div class="col-sm-12 sidenav Rsidebar">
			
			  <div class="well">
				<p>ADS</p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/dk/clientController.js') !!}"></script>

@endsection