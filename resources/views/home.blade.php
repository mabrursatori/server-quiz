@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
        <div class="row">
            <div class="col">
                <input type="hidden" class="base-url" value="{{ url('/') }}">
                @if (session('status') && session('status') != 'update error')
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())

                    @if (session('status') == 'update error')
                        <input type="hidden" id="error" value="update error">
                        <input type="hidden" id="edit-url-error" value="{{ old('url') }}">
                    @else
                        <input type="hidden" id="error" value="error">
                    @endif
                @endif
                <button data-toggle="modal" id="btn-create" data-target="#createModal" class="btn btn-primary">d</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ $question->id }}</th>
                                <td>{{ $question->title }}</td>
                                <td>{{ $question->type }}</td>
                                <td>{{ $question->mode }}</td>
                                <td><img src="{{ asset('storage/' . $question->asset) }}" width="70px" /></td>
                                <td>
                                    <a data-id="{{ $question->id }}" data-toggle="modal" data-target="#detailModal"
                                        class="btn btn-warning btn-sm detail"><i class="fa fa-exclamation"></i></a>
                                    <a data-id="{{ $question->id }}" data-toggle="modal" data-target="#editModal"
                                        class="btn btn-success btn-sm edit"><i class="fa fa-pencil edit"></i></a>
                                    <form onsubmit="return confirm('Delete this data permanently?')" class="d-inline"
                                        action="{{ route('questions.destroy', [$question->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" id="delete" href="#" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item detail-title">A disabled item</li>
                        <li class="list-group-item detail-question">A second item</li>
                        <li class="list-group-item detail-trueAnswer">A third item</li>
                        <li class="list-group-item detail-falseAnswer1">A fourth item</li>
                        <li class="list-group-item detail-falseAnswer2">And a fifth one</li>
                        <li class="list-group-item detail-falseAnswer3">And a fifth one</li>
                        <li class="list-group-item detail-description">And a fifth one</li>
                        <li class="list-group-item detail-quran">And a fifth one</li>
                        <li class="list-group-item detail-quranTranslate">And a fifth one</li>
                        <li class="list-group-item detail-hadits">And a fifth one</li>
                        <li class="list-group-item detail-haditsTranslate">And a fifth one</li>
                        <li class="list-group-item detail-kitab">And a fifth one</li>
                        <li class="list-group-item detail-kitabTranslate">And a fifth one</li>
                        <li class="list-group-item detail-type">And a fifth one</li>
                        <li class="list-group-item detail-mode">And a fifth one</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('questions.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ old('title') }}" type="text" name="title"
                                class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" id="title">
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Asset</label>
                            <div class="custom-file">
                                <input type="file" name="asset" class="custom-file-input" id="asset">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea name="question"
                                class="form-control {{ $errors->first('question') ? 'is-invalid' : '' }}" id="question"
                                rows="3">{{ old('question') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('question') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="trueAnswer">True Answer</label>
                            <input value="{{ old('trueAnswer') }}" name="trueAnswer" type="text"
                                class="form-control {{ $errors->first('trueAnswer') ? 'is-invalid' : '' }}"
                                id="trueAnswer">
                            <div class="invalid-feedback">
                                {{ $errors->first('trueAnswer') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer1">False Answer 1</label>
                            <input value="{{ old('falseAnswer1') }}" name="falseAnswer1" type="text"
                                class="form-control {{ $errors->first('falseAnswer1') ? 'is-invalid' : '' }}"
                                id="falseAnswer1">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer1') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer2">False Answer 2</label>
                            <input value="{{ old('falseAnswer2') }}" name="falseAnswer2" type="text"
                                class="form-control {{ $errors->first('falseAnswer2') ? 'is-invalid' : '' }}"
                                id="falseAnswer2">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer2') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer3">False Answer 3</label>
                            <input value="{{ old('falseAnswer3') }}" name="falseAnswer3" type="text"
                                class="form-control {{ $errors->first('falseAnswer3') ? 'is-invalid' : '' }}"
                                id="falseAnswer3">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer3') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"
                                class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                                id="description" rows="3">{{ old('description') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quran">Quran</label>
                            <textarea name="quran" class="form-control {{ $errors->first('quran') ? 'is-invalid' : '' }}"
                                id="quran" rows="3">{{ old('quran') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('quran') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quranTranslate">Quran Translate</label>
                            <textarea name="quranTranslate"
                                class="form-control {{ $errors->first('quranTranslate') ? 'is-invalid' : '' }}"
                                id="quranTranslate" rows="3">{{ old('quranTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('quranTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hadits">Hadits</label>
                            <textarea name="hadits"
                                class="form-control {{ $errors->first('hadits') ? 'is-invalid' : '' }}" id="hadits"
                                rows="3">{{ old('hadits') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('hadits') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="haditsTranslate">Hadits Translate</label>
                            <textarea name="haditsTranslate"
                                class="form-control {{ $errors->first('haditsTranslate') ? 'is-invalid' : '' }}"
                                id="haditsTranslate" rows="3">{{ old('haditsTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('haditsTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kitab">Kitab</label>
                            <textarea name="kitab" class="form-control {{ $errors->first('kitab') ? 'is-invalid' : '' }}"
                                id="kitab" rows="3">{{ old('kitab') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('kitab') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kitabTranslate">Kitab Translate</label>
                            <textarea name="kitabTranslate"
                                class="form-control {{ $errors->first('kitabTranslate') ? 'is-invalid' : '' }}"
                                id="kitabTranslate" rows="3">{{ old('kitabTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('kitabTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control {{ $errors->first('type') ? 'is-invalid' : '' }}"
                                id="type">
                                <option value="">-CHOOSE TYPE-</option>
                                <option value="FIQIH" {{ old('type') == 'FIQIH' ? 'selected' : '' }}>Fiqih
                                </option>
                                <option value="TAUHID" {{ old('type') == 'TAUHID' ? 'selected' : '' }}>Tauhid</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mode">Mode</label>
                            <select name="mode" class="form-control {{ $errors->first('mode') ? 'is-invalid' : '' }}"
                                id="mode">
                                <option value="">-CHOOSE MODE-</option>
                                <option value="EASY" {{ old('mode') == 'EASY' ? 'selected' : '' }}>Easy</option>
                                <option value="MEDIUM" {{ old('mode') == 'MEDIUM' ? 'selected' : '' }}>Medium</option>
                                <option value="HARD" {{ old('mode') == 'HARD' ? 'selected' : '' }}>Hard</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" class="form-edit">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldAsset" id="edit-oldAsset" value="{{ old('oldAsset') }}">
                        <input type="hidden" name="url" id="edit-url">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" id="edit-title">
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Asset</label>
                            <div class="custom-file">
                                <input type="file" name="asset" class="custom-file-input" id="asset">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea name="question"
                                class="form-control {{ $errors->first('question') ? 'is-invalid' : '' }}"
                                id="edit-question" rows="3">{{ old('question') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('question') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="trueAnswer">True Answer</label>
                            <input value="{{ old('trueAnswer') }}" name="trueAnswer" type="text"
                                class="form-control {{ $errors->first('trueAnswer') ? 'is-invalid' : '' }}"
                                id="edit-trueAnswer">
                            <div class="invalid-feedback">
                                {{ $errors->first('trueAnswer') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer1">False Answer 1</label>
                            <input value="{{ old('falseAnswer1') }}" name="falseAnswer1" type="text"
                                class="form-control {{ $errors->first('falseAnswer1') ? 'is-invalid' : '' }}"
                                id="edit-falseAnswer1">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer1') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer2">False Answer 2</label>
                            <input value="{{ old('falseAnswer2') }}" name="falseAnswer2" type="text"
                                class="form-control {{ $errors->first('falseAnswer2') ? 'is-invalid' : '' }}"
                                id="edit-falseAnswer2">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer2') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falseAnswer3">False Answer 3</label>
                            <input value="{{ old('falseAnswer3') }}" name="falseAnswer3" type="text"
                                class="form-control {{ $errors->first('falseAnswer3') ? 'is-invalid' : '' }}"
                                id="edit-falseAnswer3">
                            <div class="invalid-feedback">
                                {{ $errors->first('falseAnswer3') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"
                                class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                                id="edit-description" rows="3">{{ old('description') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quran">Quran</label>
                            <textarea name="quran" class="form-control {{ $errors->first('quran') ? 'is-invalid' : '' }}"
                                id="edit-quran" rows="3">{{ old('quran') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('quran') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quranTranslate">Quran Translate</label>
                            <textarea name="quranTranslate"
                                class="form-control {{ $errors->first('quranTranslate') ? 'is-invalid' : '' }}"
                                id="edit-quranTranslate" rows="3">{{ old('quranTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('quranTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hadits">Hadits</label>
                            <textarea name="hadits"
                                class="form-control {{ $errors->first('hadits') ? 'is-invalid' : '' }}" id="edit-hadits"
                                rows="3">{{ old('hadits') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('hadits') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="haditsTranslate">Hadits Translate</label>
                            <textarea name="haditsTranslate"
                                class="form-control {{ $errors->first('haditsTranslate') ? 'is-invalid' : '' }}"
                                id="edit-haditsTranslate" rows="3">{{ old('haditsTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('haditsTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kitab">Kitab</label>
                            <textarea name="kitab" class="form-control {{ $errors->first('kitab') ? 'is-invalid' : '' }}"
                                id="edit-kitab" rows="3">{{ old('kitab') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('kitab') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kitabTranslate">Kitab Translate</label>
                            <textarea name="kitabTranslate"
                                class="form-control {{ $errors->first('kitabTranslate') ? 'is-invalid' : '' }}"
                                id="edit-kitabTranslate" rows="3">{{ old('kitabTranslate') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('kitabTranslate') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control {{ $errors->first('type') ? 'is-invalid' : '' }}"
                                id="edit-type">
                                <option value="">-CHOOSE TYPE-</option>
                                <option value="FIQIH" {{ old('type') == 'FIQIH' ? 'selected' : '' }}>Fiqih
                                </option>
                                <option value="TAUHID" {{ old('type') == 'TAUHID' ? 'selected' : '' }}>Tauhid</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mode">Mode</label>
                            <select name="mode" class="form-control {{ $errors->first('mode') ? 'is-invalid' : '' }}"
                                id="edit-mode">
                                <option value="">-CHOOSE MODE-</option>
                                <option value="EASY" {{ old('mode') == 'EASY' ? 'selected' : '' }}>Easy</option>
                                <option value="MEDIUM" {{ old('mode') == 'MEDIUM' ? 'selected' : '' }}>Medium</option>
                                <option value="HARD" {{ old('mode') == 'HARD' ? 'selected' : '' }}>Hard</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
