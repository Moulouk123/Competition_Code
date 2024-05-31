@extends('user.header')

<style>
  body {
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
  }

  .card {
    width: 90%;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }

  .card-body {
    padding: 20px;
  }

  .card-title {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .card-description {
    color: #555;
    margin-bottom: 15px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .label {
    font-weight: bold;
  }

  .typeahead-container {
    position: relative;
    display: inline-block;
  }

  .tt-input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .tt-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 100;
    display: none;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .answer-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width:80%;
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }

  .answer-list {
    width: 100%;
    align-items: center;
    justify-content: center; /* Center the items horizontally */
  }

  .answer {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
    align-items: center;
  }

  .answer i {
    margin-right: 10px;
  }

  .filter-buttons {
    width: 30%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  .button {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
  }
  .buttonshare {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #e3e3e3;
    color: black;
  }
  .button-secondary {
    background-color: #ecf0f1;
    color: #333;
  }

  .answer-card {
    display: flex;
    padding: 20px;
   width:100%;
    margin-bottom: 20px;
  }

  .answer-card img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 20px;
  }

  .answer-content {
    flex: 1;
  }

  .answer-details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .answer-name {
    color: #555;
    font-weight: bold;
  }

  .answer-rating {
    color: #555;
  }

  .answer-text {
    margin-bottom: 10px;
  }

  .answer-file {
    color: #555;
  }
  .answerp-card {
    display: flex;
    padding: 20px;
    width: 80%; /* Adjust the width as needed */
    margin: 20px auto; /* Center the card */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.answerp-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 20px;
}

.answerp-content {
    flex: 1;
}

.answerp-details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.answerp-name {
    color: #3498db; /* Adjust the color as needed */
    font-weight: bold;
}

.answerp-textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.file-input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.buttonp {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
}
.button-group {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.text-center {
    text-align: center;
    color: #3498db; /* Change the color to your preference */
    font-size: 24px; /* Adjust the font size as needed */
    margin-top: 20px; /* Add some top margin for spacing */
    font-weight: bold; /* Make the text bold */
}

.star-rating {
    display: flex;
}

.star-label {
    cursor: pointer;
    color: #ccc; /* Change to your desired inactive color for unselected stars */
    font-size: 24px; /* Adjust the size of stars as needed */
}

.star-label:hover,
.star-label:hover ~ .star-label,
.star-label.rated,
.star-label.rated ~ .star-label {
    color: #f39c12; /* Change to your desired yellow color */
}


</style>
@section('content')


    <div id="contact" class="contact-us section">
        <div class="container">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Question :</h4>
        <p class="card-description">
            {{ $question->title }} {{-- Assuming title is the field representing the question --}}
        </p>
        <div class="answer-file">
            @if ($question->file_path)
                <a href="{{ url('/download-file/' . $question->id) }}">Download File</a>
            @endif
        </div>
    </div>
</div>

            <div class="answer-container">
                <div class="answer-list">
                    <strong><p>{{ $numberOfAnswers }} answers</p></strong>
                    @foreach ($answers as $answer)
                        <form id="form-{{ $answer->id }}" action="{{ url('/rateanswer/' . $answer->id) }}" method="post" style="display: none;">
                            @csrf
                            <input type="hidden" name="rating" id="rating-{{ $answer->id }}" value="">
                        </form>

                        <div class="answer-card">
                            <img src="{{ asset('images/faces/face27.jpg') }}">
                            <div class="answer-content">
                                <div class="answer-details">
                                    <div class="answer-name">{{ $answer->user->name }}</div>
                                    <div class="answer-rating">
                                        @if (app("App\Http\Controllers\RateController")->getRate($answer->question_id, $answer->id))
                                            <div class="star-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label class="star-label {{ $i <= $answer->rating ? 'rated' : '' }}" onclick="rateAnswer({{ $answer->id }}, {{ $i }}, this)">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                        @else
                                            <div class="star-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <label class="star-label" onclick="rateAnswer({{ $answer->id }}, {{ $i }}, this)">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                        @endif
                                    </div>





                                </div>
                                <div class="answer-text">{{ $answer->content }}</div>

                                <div class="answer-file">
                                    @if ($answer->file_path)
                                        <a href="{{ url('/download-filee/' . $answer->id) }}">View File</a>
                                    @endif
                                </div>
                                <div>
                                    <button class="buttonshare" onclick="copyLink()">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="filter-buttons">
                    <a type ="button" class="button" href="{{ route('allAnswersByQ', ['id' => $question->id]) }}">ALL</a>

                    <a class="button button-secondary" href="{{ route('filterAnswersByCreatedAt', ['id' => $question->id]) }}">Newest</a>
                    <button class="button button-secondary">Frequent</button>
                </div>
            </div>
<div >

@auth
<div class="container">
    <h2 class="text-center">You Can Post Your Answer Here <i class="fas fa-hand-point-down"></i></h2>

<form action="{{ url('/add-answer/' . $question->id.'/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="answerp-card">
    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="answerp-image">
    <div class="answerp-content">
        <div class="answerp-details">
            <div class="answerp-name" name="content" >{{ Auth::user()->name }}</div>
        </div>

        <!-- Input for Answer Content -->
        <div class="form-group">
            <label for="content" class="label">Answer Content:</label>
            <textarea id="content" name="content" required placeholder="write your answer............." class="answerp-textarea" rows="3" cols="2"></textarea>
        </div>

        <!-- Input for File Upload -->
        <div class="form-group">
            <label for="file_path" class="label">File upload (PDF, DOC, DOCX):</label>
            <div class="input-group col-xs-12">
                <input type="file" id="file_path" name="file_path" class="file-input" placeholder="Upload File">
            </div>
        </div>

        <div class="button-group">
        <button class="buttonp" type="submit">Submit</button>
        <button class="buttonp" type="reset" onclick="clearForm()">Cancel</button>
</div>
      </div>
</div>

</form>
@endauth
</div>
</div>
        </div>
        @endsection
<script>
    function copyLink() {
        // Get the text content (URL)
        var text = window.location.href;

        // Create a temporary input element
        var input = document.createElement("input");
        input.value = text;
        document.body.appendChild(input);

        // Select and copy the text
        input.select();
        document.execCommand("copy");

        // Remove the temporary input element
        document.body.removeChild(input);


    }
</script>
<script>
    function clearForm() {
        document.getElementById('questionForm').reset();
    }
</script>
        <script>
            function rateAnswer(answerId, rating, element) {
                // Update the appearance of the stars
                var labels = element.parentNode.children;
                for (var i = 0; i < labels.length; i++) {
                    labels[i].classList.remove('rated');
                    if (i < rating) {
                        labels[i].classList.add('rated');
                    }
                }

                // Make AJAX request to add like
                var formData = new FormData();
                formData.append('answerId', answerId);
                formData.append('rating', rating);

                fetch('{{ url('/rate-answer') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Error:', error));
            }
        </script>
