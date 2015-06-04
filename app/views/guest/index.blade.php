@extends('layouts.guest')
@section('content')
    <h1 class="uk-heading-large">Daftar Buku</h1>
    <table class="uk-table uk-table-striped uk-table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kupinang engkau dengan hamdalah</td>
                <td>Mohammad Fauzil Adhim</td>
                <td>2/3</td>
                <td><a href="#">Pinjam Buku</a></td>
            </tr>
            <tr>
                <td>Jalan Cinta Para Pejuang</td>
                <td>Salim A.fillah</td>
                <td>0/3</td>
                <td><span class="uk-text-muted">Pinjam Buku</span></td>
            </tr>
            <tr>
                <td>Cinta dan Seks Rumah Tangga Muslim</td>
                <td>Aam Amiruddin</td>
                <td>1/3</td>
                <td><a href="#">Pinjam Buku</a></td>
            </tr>
        </tbody>
    </table>
@stop