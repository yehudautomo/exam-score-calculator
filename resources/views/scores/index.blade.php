<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('scores.create') }}" class="btn btn-md btn-success mb-3">TAMBAH NILAI</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">NIM</th>
                            <th scope="col">QUIZ</th>
                            <th scope="col">Assignment</th>
                            <th scope="col">Absence</th>
                            <th scope="col">Practical</th>
                            <th scope="col">Final</th>
                            <th scope="col">Final Score</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($scores as $score)
                            <tr>
                                <td>{{ $score->name }}</td>
                                <td>{!! $score->nim !!}</td>
                                <td>{!! $score->quiz_score !!}</td>
                                <td>{!! $score->assignment_score !!}</td>
                                <td>{!! $score->absence_score !!}</td>
                                <td>{!! $score->practical_score !!}</td>
                                <td>{!! $score->final_score !!}</td>
                                @if(($score->quiz_score + $score->assignment_score + $score->absence_score + $score->practical_score + $score->final_score)/5 > 85)
                                    <td>A</td>
                                @elseif(($score->quiz_score + $score->assignment_score + $score->absence_score + $score->practical_score + $score->final_score)/5 > 75 and ($score->quiz_score + $score->assignment_score + $score->absence_score + $score->practical_score + $score->final_score)/5 <= 85)
                                    <td>B</td>
                                @elseif(($score->quiz_score + $score->assignment_score + $score->absence_score + $score->practical_score + $score->final_score)/5 > 65 and ($score->quiz_score + $score->assignment_score + $score->absence_score + $score->practical_score + $score->final_score)/5 <= 75)
                                    <td>C</td>
                                @else
                                    <td>D</td>
                                @endif
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('scores.destroy', $score->id) }}" method="POST">
                                        <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Nilai belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $scores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

    toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>

</body>
</html>
