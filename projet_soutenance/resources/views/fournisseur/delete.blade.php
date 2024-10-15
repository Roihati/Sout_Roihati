@section('name')
<form action="{{ route('fournisseur.delete', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>

@endsection
   
   