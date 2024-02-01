<footer class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                                <p class="contact-info">
                                    House no: Zaalheuvelweg 7, Place: Velp/Grave, Postal code: 5363TE, Country: Netherlands
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-4">
                    <div class="form-wrapper">
                        <form action="{{ route('home.page') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="d-none" for="name"></label>
                                <input type="text" id="name" class="input form-control" name="name" placeholder="Name.">
                            </div>
                            <div class="form-group">
                                <label class="d-none" for="email"></label>
                                <input type="email" id="email" class="input form-control" name="email" placeholder="E-mail.">
                            </div>
                            <div class="form-group">
                                <label class="d-none" for="message"></label>
                                <textarea type="text" id="message" class="input form-control" name="message" placeholder="Message."></textarea>
                            </div>

                            <button type="submit" class="contact-submit-btn btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
