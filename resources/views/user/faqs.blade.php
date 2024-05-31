@extends('user.header');
@section('content')

    <style>

    .containerr {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border-radius: 10px;
        margin: 20px;
        max-width: 100%;

    }

    .faq-list {
        padding: 20px;
        width: 1200px; /* Adjusted width */
        overflow-y: auto;
        text-align: center; /* Center the content */
    }

    .faq-item {
        cursor: pointer;
        margin-bottom: 10px;
        padding: 8px;
        border-radius: 5px;
        background-color: #f2f2f2; /* Set FAQ item background color */
        color: #333333; /* Set FAQ item text color */
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .arrow-icon {
        font-size: 20px;
    }

    .faq-description {
        display: none;
        background-color: #f2f2f2; /* Set FAQ description background color */
        padding: 20px;
        margin-top: 10px;
        width: 615px; /* Adjusted width */
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: left; /* Align text to the left */
    }

    .faq-description p {
        margin-top: 10px;
        color: #333333; /* Set FAQ description text color */
    }
</style>

    <div id="contact" class="contact-us section">
        <div class="container">
<div class="containerr">
    <div class="faq-list">
        <?php foreach ($faqs as $faq): ?>
            <div class="faq-item" onclick="toggleDescription('faq<?= $faq->id ?>')">
                <?= $faq->question ?>
                <span class="arrow-icon" id="arrow<?= $faq->id ?>">▼</span>
            </div>
            <div class="faq-description" id="faq<?= $faq->id ?>">
                <p><?= $faq->details ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <img class="image" src="{{asset('assets/images/faq.jpg')}}" alt="FAQ Image">
</div>
        </div>
    </div>
@endsection

<script>
    function toggleDescription(faqId) {
        var descriptions = document.querySelectorAll('.faq-description');
        var arrows = document.querySelectorAll('.arrow-icon');

        descriptions.forEach(function(description) {
            if (description.id === faqId) {
                description.style.display = description.style.display === "block" ? "none" : "block";
            } else {
                description.style.display = "none";
            }
        });

        arrows.forEach(function(arrow) {
            if (arrow.id === 'arrow' + faqId.slice(-1)) {
                arrow.innerHTML = arrow.innerHTML === '▼' ? '▲' : '▼';
            } else {
                arrow.innerHTML = '▼';
            }
        });
    }
</script>



<!-- Scripts -->