@extends('layout.master')
@section('content')
	<section class="section">
		<div class="container">
			<article class="message is-primary">
				<div class="message-body">
					This note was <b>destroyed</b>. If you need to keep it, copy it before closing this window.
				</div>
			</article>
			<h1 class="title">Note contents</h1>
			<div class="field">
				<p class="control">
					<textarea class="textarea">{{ $note }}</textarea>
				</p>
			</div>
		</div>
	</section>
@endsection