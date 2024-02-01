<footer class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-message">
                        <h2 class="footer-title">Drop me a message.</h2>
                        <p class="footer-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt leo sit amet tempor
                            ullamcorper. Suspendisse felis leo, rutrum nec mattis at, vehicula vehicula metus. Nullam
                            porttitor dolor vel elementum elementum. Morbi quis congue sem. Nam euismod eros auctor sapien
                            lacinia imperdiet. Vestibulum mollis quam urna, at ornare nisi efficitur non. Vestibulum dictum
                            nibh sed tincidunt mattis.
                        </p>
                    </div>
                    <div class="footer-contact-info">
                        <div class="contact-info-wrapper">
                            <div class="tel">
                                <div class="image-wrapper">
                                    <img class="contact-img" src="{{ mix('assets/media/images/icons/telephone.svg')  }}" alt="Telephone icon">
                                </div>
                                <p class="contact-info">+31 6 24737066</p>
                            </div>
                            <div class="email">
                                <div class="image-wrapper">
                                    <img class="contact-img" src="{{ mix('assets/media/images/icons/envelope-at.svg')  }}" alt="Telephone icon">
                                </div>
                                <p class="contact-info">casrovers@gmail.com</p>
                            </div>
                            <div class="location">
                                <div class="image-wrapper">
                                    <img class="contact-img" src="{{ mix('assets/media/images/icons/geo-alt.svg')  }}" alt="Telephone icon">
                                </div>
                                <p class="contact-info">House no: 7 Zaalheuvelweg, velp, 5363TE, Netherlands</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <form action="{{ route('home.page') }}" method="post">

                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
