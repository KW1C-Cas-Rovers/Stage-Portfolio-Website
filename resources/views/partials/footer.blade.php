<footer class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row gap-2 gap-md-0">
                <h2 class="text-center">Contact.</h2>
                <div class="col-md-6">
                    <div class="footer-message">
                        <h3 class="footer-title">Drop me a message.</h3>
                        <p class="footer-description">
                            {{ __('Als u vragen heeft over wat ik doe en/of wie ik ben, kunt u mij een bericht sturen of
                            contact met mij opnemen.') }}
                        </p>
                    </div>
                    <div class="footer-contact-info">
                        <div class="contact-info-wrapper">
                            <div class="tel">
                                <div class="image-wrapper">
                                    <img class="contact-img" src="{{ mix('assets/media/images/icons/telephone.svg')  }}"
                                         alt="Telephone icon">
                                </div>
                                <p class="contact-info">+31 6 24737066</p>
                            </div>
                            <div class="email">
                                <div class="image-wrapper">
                                    <img class="contact-img"
                                         src="{{ mix('assets/media/images/icons/envelope-at.svg')  }}"
                                         alt="Telephone icon">
                                </div>
                                <p class="contact-info">casrovers@gmail.com</p>
                            </div>
                            <div class="location">
                                <div class="image-wrapper">
                                    <img class="contact-img" src="{{ mix('assets/media/images/icons/geo-alt.svg')  }}"
                                         alt="Telephone icon">
                                </div>
                                <p class="contact-info">
                                    House no: Zaalheuvelweg 7, Place: Velp/Grave, Postal code: 5363TE, Country:
                                    Netherlands
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">

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
                                <input type="email" id="email" class="input form-control" name="email"
                                       placeholder="E-mail.">
                            </div>
                            <div class="form-group">
                                <label class="d-none" for="message"></label>
                                <textarea type="text" id="message" class="input form-control" name="message"
                                          placeholder="Message."></textarea>
                            </div>

                            <button type="submit" class="contact-submit-btn btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <div class="copyright">
                        <div class="logo">
                            <a class="logo-link text-light" href="{{ route('home.page') }}">C<span>.</span>Rovers</a>
                        </div>
                        <div class="copyright-text d-flex align-items-center">
                            <p>&copy; Cas Rovers - All rights reserved</p>
                        </div>
                        <div class="copyright-btns">
                            <a href="https://www.facebook.com/" class="info-buttons" target="_blank">
                                <img src="{{ mix('assets/media/images/icons/facebook.svg') }}" alt="Facebook Logo">
                            </a>
                            <a href="https://www.instagram.com/" class="info-buttons" target="_blank">
                                <img src="{{ mix('assets/media/images/icons/instagram.svg') }}" alt="Facebook Logo">
                            </a>
                            <a href="https://github.com/KW1C-Cas-Rovers" class="info-buttons" target="_blank">
                                <img src="{{ mix('assets/media/images/icons/github.svg') }}" alt="Facebook Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
