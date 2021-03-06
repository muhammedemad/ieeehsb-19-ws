@extends('layouts.app_home_articles')
@section('content')
<!-- hero image section -->
<div class="hero-image-container">
    <div class="hero-image ras-hero-image" style="background-image: url('./images/ras/hero-image.jpg');">
        <div class="hero-image-content">
            <div class="content-wrap">
                <!-- <h1>RAS</h1> -->
            </div>
        </div>
    </div>
</div>
<!-- history section -->
<div class="history ras-history">
    <div class="content-wrap">
        <p>
            It looks forward to make the undergraduate students able to build their own robot from scratch.
        </p>
    </div>
</div>
<!-- start mission -->
<div class="clear-fix"></div>
<div class="ras-mission">
    <div class="content-wrap">
        <h3>MISSION</h3>
        <p>
            Rehabilitation under-graduate students to Robotics Competition.
        </p>
    </div>
</div>
<!-- end mission -->
<!-- start highboard -->
<section class="ras-highboard">
    <div class="content-wrap">
        <h3>IEEE HSB RAS High Board</h3>
        <div class="board-member">
            <div class="member-image" style="background-image: url('./images/ras/high-board/abdulrahman-fawzy.png')"></div>
            <div class="member-data">
                <h3 class="name">Abdelrahman Hossam</h3>
                <p class="position">RAS Chairperson</p>
            </div>
            
        </div>
        <div class="board-member">
            <div class="member-image" style="background-image: url('./images/ras/high-board/tony-nazmy.png')"></div>
            <div class="member-data">
                <h3 class="name">Tony Nazmy</h3>
                <p class="position">RAS General Manager</p>
            </div>
        </div>
    </div>
</section>
<!-- end highboard -->
<!-- start competetions -->
<div class="clear-fix"></div>
<section class="competitions">
    <div class="content-wrap">
        <h3>IEEE HSB RAS Competitions</h3>
        <div class="competition">
            <h4 class="competition-name">
                Auxillio'17:
            </h4>
            <p class="competition-place">
                At Covered halls complex Cairo Stadium on 6th May 2017
            </p>
            <div class="competition-gallery">
                <img src="./images/ras/auxilio’17/image(1).png" alt="images">
                <img src="./images/ras/auxilio’17/image(2).png" alt="images">
                <img src="./images/ras/auxilio’17/image(3).png" alt="images">
                <img src="./images/ras/auxilio’17/image(4).png" alt="images">
                <img src="./images/ras/auxilio’17/image(5).png" alt="images">
                <img src="./images/ras/auxilio’17/image(6).png" alt="images">
            </div>
            <div class="clear-fix"></div>
            <p class="competition-description">
                Robots had been invented to help mankind and to do tasks human can't handle.<br>
                AUXILIO competition isn't just a simulation, it aims to come out with robots that will do exactly what they are designed for.
            </p>
            <p class="competition-winner">
                The winner team was ‘Delay’ 
            </p>
        </div>
        <div class="clear-fix"></div>
        <div class="competition">
            <h4 class="competition-name">
                Under Construction’16 :
            </h4>
            <p class="competition-place">
                At BUE on 16th March 2016
            </p>
            <div class="competition-description">
                <p>For who seeks to enter the robots world and conquer it this competition was for him basically all he has to do with his team was to build two robots:</p>
                <ol>
                    <li>Manual</li>
                    <li>Automatic</li>
                </ol>
                and do the competition task
            </div>
            <div class="competition-images">
                <img src="./images/ras/underconstruction’16/Layer 16.png" alt="images">
                <img src="./images/ras/underconstruction’16/Layer 17.png" alt="images">
            </div>
            <div class="clear-fix"></div>
            <p class="competition-winner">
                The winner team was ‘One O one’
            </p>
        </div>
    </div>
</section>
<!-- end competetions -->
<!-- start projects -->
<section class="projects">
    <div class="content-wrap">
        <h3>RAS Projects</h3>
        <div class="project">
            <div class="project-data">
                <h4 class="project-name">Robot Gloves:</h4>
                <p class="project-description">were made to minimize the weight of things </p>
                <p class="project-place">(cairo maker faire 2018)</p>
            </div>
            <div class="project-image">
                <img src="https://via.placeholder.com/590x372" width="590" height="372" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end projects -->
<!-- start ras events -->
<section class="ras-events">
    <div class="content-wrap">
        <h3>RAS events</h3>
        <div class="event">
            <div class="event-data">
                <h4 class="event-name">Auxilio 2.0:</h4>
                <div class="event-description">
                    <p>help mankind through protecting workers from the poisonous environment around them that causes them serious illnesses. by replacing the workers who work on production lines with robots. and it’s a simulation of a production line that uses an industrial robotic arm for fetching packages then an automatic robot delivers them in batches through specific lanes to different zones. It contained two levels sessions:</p>
                    <ul>
                        <li>Level 1: Arduino, mechanics and solidworks </li>
                        <li>Level 2: URDF,GUI,KINEMATICS and Arduino interface </li>
                    </ul>
                </div>
            </div>
            <div class="event-images">
                <img src="https://via.placeholder.com/472x345" width="472" height="345" alt="">
                <img src="https://via.placeholder.com/472x345" width="472" height="345" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end ras events -->
@endsection
