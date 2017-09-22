<div class='col-lg-12'>
@if(count($employees)>0)
	@php
	$emp = $employees
	@endphp
	
	<table border=1 cellspacing=4 cellpadding=4>
		<tbody>
			<tr>
				<td>Name</td>
				<td>{{$emp->name}}</td>
			</tr>
			<tr>
				<td>Personal Email</td>
				<td>{{$emp->personal_email}}</td>
			</tr>
			<tr>
				<td>Business Email</td>
				<td>{{$emp->business_email}}</td>
			</tr>
			<tr>
				<td>Personal Skype</td>
				<td>{{$emp->personal_skype}}</td>
			</tr>
			<tr>
				<td>Business Skype</td>
				<td>{{$emp->business_skype}}</td>
			</tr>
			<tr>
				<td>Phonenumber</td>
				<td>{{$emp->phone_number}}</td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td>{{$emp->birthday}}</td>
			</tr>
			<tr>
				<td>Date Of Join</td>
				<td>{{$emp->dateofjoin}}</td>
			</tr>
			<tr>
				<td>Role Title</td>
				<td>{{$emp->roles->role_title}}</td>
			</tr>

		</tbody>
	</table>
@else
 testing
@endif
</div>