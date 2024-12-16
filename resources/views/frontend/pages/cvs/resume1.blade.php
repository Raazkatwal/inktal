<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="{{asset('cvs/resume1.css')}}">
    <style>
       /* General button container styling */
        .button-container {
            position: relative; /* Ensures positioning is relative to this container */
        }

        /* Button Styling */
        .btn-download {
            position: absolute; /* Use absolute positioning relative to container */
            top: -32rem;
            left: -15rem;
            padding: 0.7rem 1.5rem; /* Add horizontal padding for better button shape */
            border-radius: 1rem;
            border: none;
            background: linear-gradient(342deg, rgba(2, 0, 36, 1) 0%, rgba(214, 79, 221, 1) 35%, rgba(0, 212, 255, 1) 100%);
            color: #fff;
            font-size: 1rem;
            font-weight: bold; /* Improve text visibility */
            cursor: pointer; /* Indicates the element is clickable */
            transition: background 0.3s ease, transform 0.2s ease; /* Add hover effects */
        }

        /* Button Hover Effect */
        .btn-download:hover {
            background: linear-gradient(342deg, rgba(2, 0, 36, 1) 0%, rgba(214, 79, 221, 1) 50%, rgba(0, 212, 255, 1) 80%);
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        /* Ensure print styles hide the button */
        @media print {
            .no-print {
                display: none !important;
            }
        }

    </style>
</head>
<body>
    <div class="button-container">
        <button class="btn-download no-print" id="printPdf">Download CV</button>
    </div>

    <div class="container">

        <!-- Sidebar Section -->
        <div class="sidebar">
            <div class="profile-photo">

                <img src="{{ $candidate_info->photo ? asset($candidate_info->photo) : asset('cvs/images/resume1/Naruto_Uzumaki.webp')}}" alt="Profile Photo">
            </div>
            <h2>{{$auth->name}}</h2>
            <p>{{$candidate_info->title}}</p>
            <div class="details">
                <h3>Contact Information</h3>
                <p>Location: {{$candidate_info->address}}
                    <br>
                    Phone: {{$auth->contactInfo->phone}}
                    <br>
                    Secondary Phone: {{$auth->contactInfo->secondary_phone}}
                    <br>
                    Whatsapp Number : {{$candidate_info->whatsapp_number}}
                    <br>Personal Website: {{$candidate_info->website}}</p>
            </div>
            <div class="social-links">
                <h3>Social Media Links</h3>
                <p>LinkedIn: thenaruto710
                    <br>X: @naruto1011</p>
            </div>
            <div class="personal">
                <h3>Personal Information</h3>
                <p>Date of Birth: {{ \Carbon\Carbon::parse($candidate_info->birth_date)->format('F j, Y') }}

                    <br>Gender: {{$candidate_info->gender}}
                    <br>Marital Status: {{$candidate_info->marital_status}}
                    <br>Profession: {{$candidate_info->profession_translation->name}}
                    <br>Availability: {{$candidate_info->status}}
                    <br>Education level: {{$candidate_info->education->slug}}
                    <br>Experience Level: {{$candidate_info->experience->slug}}
                </p>
            </div>
            <div class="languages">

                <h3>Languages</h3>
                <p>
                @foreach ($candidate_info['languages'] as $language)
                {{$language->name}}<br>
                @endforeach
            </p>
            </div>
        </div>

        {{--  Main Content Section   --}}
        <div class="main-content">
            <div class="biography">
                <h2>Biography</h2>
                <p>{!!$candidate_info->bio!!}</p>
            </div>
            <div class="experience">
                <h2>Experience</h2>
                @foreach ($candidate_info['experiences'] as $experience)
                    <h3>{{ $experience->designation }} - {{ $experience->company }}</h3>
                    <p>Department: {{ $experience->department }}<br>Period: {{ $experience->start }} - {{ $experience->end }}</p>

                    <ul>
                        <li>{{ $experience->responsibilities }}</li>
                    </ul>
                @endforeach
            </div>


            <div class="education">
                <h2>Education</h2>
                @foreach ($candidate_info['educations'] as $education)
                 <h4>{{$education->level}} - {{$education->degree}} ({{$education->year}})</h4>

                 <br>

                    <ul>
                        <li> {{$education->notes}}</li>
                    </ul>

            @endforeach
            </div>
        </div>
    </div>
</body>

    <script>
        document.getElementById('printPdf').addEventListener('click', function () {
            window.print(); // Opens the browser's print dialog
        });
    </script>

</html>
