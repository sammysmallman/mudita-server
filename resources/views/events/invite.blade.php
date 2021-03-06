<div class="card flex flex-col mt-3">
	<h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-brand-green pl-4">
		Invite a Team Member
	</h3>
	<form method="POST" action="{{ $event->path() . '/invitations'}}" class="text-right">
		@csrf
		<div class="mb-3">
			<input  type="email" 
			name="email" 
			class="border border-gray-800 rounded w-full py-2 px-3" 
			placeholder="Email address">
		</div>
		<button type="submit" class="bg-brand-green text-white text-base px-4 py-2 rounded shadow hover:bg-teal-700 focus:outline-none focus:shadow-outlin">Invite</button>
	</form>
	@include('errors', ['bag' => 'invitations'])
</div>