<div data-role="modal" aria-hidden="true" class="modal" id="modal">
	<div tabindex="-1" data-modal-close class="modal-overlay">
		<div role="dialog" aria-modal="true" aria-labelledby="{{$title_modal}}" class="modal-container">
			<header class="moda-header">
				<h2 class="modal-title">
					{{$title_modal}}
				</h2>
				<button aria-label="Close modal" data-modal-close class="modal-close">x</button>
			</header>
			<div class="modal-content">
				{!!$contet_modal!!}
			</div>
		</div>
	</div>
</div>