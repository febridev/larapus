<div class="uk-form-row">
	{{ Form::labelUk('title','Judul')}}
	{{ Form::textUk('title','Judul Buku','uk-icon-book')}}
</div>
<div class="uk-form-row">
	{{ Form::labelUk('author_id','Penulis')}}
	{{ Form::select('author_id',array(''=>'') + Author::lists('name','id'),null,
					array( 'id'=>'author_id', 'placeholder'=>"Pilih Penulis")
					)}}
</div>
<div class="uk-form-row">
	{{ Form::labelUk('amount','Jumlah')}}
	{{ Form::textUk('amount','Jumlah Buku','uk-icon-unsorted')}}
</div>
<div class="uk-form-row">
	{{ Form::labelUk('cover','Cover')}}
	<div class="form-controls">
		{{Form::file('cover')}}
		@if(isset($book) && $book->cover)
			<p>
				{{HTML::image(asset('img/'.$book->cover),null,['class'=>'uk-thumbnail-medium'])}}
			</p>
		@endif
	</div>
</div>
{{ HTML::divider()}}
<div class="uk-form-row">
	{{ Form::submitUk('Simpan')}}
</div>
<script>
	$(document).ready(funtction()
		{
			$("#author_id").select2();
		});
</script>
