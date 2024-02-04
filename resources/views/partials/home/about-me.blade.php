<div id="about-me" class="about-me">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="image-container">
                    <img src="#" alt="{{ __('Profiel foto') }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="about-me-container">
                    <h4 class="about-me-title">{{ __('Over Mij.')  }}</h4>
                    <p class="about-me-description">
                        {{ __('Mijn passie voor technologie begon al toen ik een klein kind was. Ik was altijd al gefascineerd
                        door hoe computers werken en wat je ermee kunt doen. Toen ik ouder werd, ontdekte ik
                        programmeren en ik was meteen verkocht. Ik vond het geweldig om te zien wat je met deze
                        vaardigheden kunt maken. Het begon natuurlijk allemaal met simpele HTML en CSS, maar al snel
                        wilde ik meer leren.
                        Ik ben erg gemotiveerd om mijn reis door te zetten in de wereld van softwareontwikkeling, en met
                        elke ervaring die ik op doe mijn vaardigheden aan te scherpen, en zo mijn droom om een
                        succesvolle softwareontwikkelaar te worden werkelijkheid te maken.') }}
                    </p>
                    <div class="about-me-btn-wrapper">
                        <a class="contact-btn" href="#contact">Contact</a>
                        <a class="cv-btn btn btn-outline-secondary" href="{{ route('download.cv', ['fileName' => 'CV.pdf']) }}">Mijn CV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
