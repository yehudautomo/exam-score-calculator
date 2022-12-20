<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('scores.update', $score->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label class="font-weight-bold">NAMA MURID</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Name Murid">

                            <!-- error message untuk title -->
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NIM MURID</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" placeholder="Masukkan Name Murid">

                            <!-- error message untuk title -->
                            @error('nim')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NILAI QUIZ</label>
                            <input type="number" class="form-control @error('quiz_score') is-invalid @enderror" name="quiz_score" value="{{ old('quiz_score') }}" placeholder="0">

                            <!-- error message untuk title -->
                            @error('quiz_score')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NILAI ASSIGNMENT</label>
                            <input type="number" class="form-control @error('assignment_score') is-invalid @enderror" name="assignment_score" value="{{ old('assignment_score') }}" placeholder="0">

                            <!-- error message untuk title -->
                            @error('assignment_score')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NILAI ABSENCE</label>
                            <input type="number" class="form-control @error('absence_score') is-invalid @enderror" name="absence_score" value="{{ old('absence_score') }}" placeholder="0">

                            <!-- error message untuk title -->
                            @error('absence_score')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NILAI PRAKTEK</label>
                            <input type="number" class="form-control @error('practical_score') is-invalid @enderror" name="practical_score" value="{{ old('practical_score') }}" placeholder="0">

                            <!-- error message untuk title -->
                            @error('practical_score')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NILAI UAS</label>
                            <input type="number" class="form-control @error('final_score') is-invalid @enderror" name="final_score" value="{{ old('final_score') }}" placeholder="0">

                            <!-- error message untuk title -->
                            @error('final_score')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
