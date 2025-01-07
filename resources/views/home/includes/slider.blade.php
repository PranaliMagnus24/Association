<!--==========================-->
        <!--=         Banner         =-->
        <!--==========================-->
        <style>

@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap");

:root {
  --clr-1: #00c2ff;
  --clr-2: #33ff8c;
  --clr-3: #ffc640;
  --clr-4:rgb(76, 124, 255);

  --blur: 1rem;
  --fs: clamp(3rem, 8vw, 7rem);
  --ls: clamp(-1.75px, -0.25vw, -3.5px);
}

.content {
  text-align: left;
}

.title {
  font-size: var(--fs);
  font-weight: 700;
  letter-spacing: var(--ls);
  position: relative;
  overflow: hidden;
  background: var(--bg);
  margin: 0;
}

.subtitle {
}

.aurora {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  mix-blend-mode: darken;
  pointer-events: none;
}

.aurora__item {
  overflow: hidden;
  position: absolute;
  width: 60vw;
  height: 60vw;
  background-color: var(--clr-1);
  border-radius: 37% 29% 27% 27% / 28% 25% 41% 37%;
  filter: blur(var(--blur));
  mix-blend-mode: overlay;
}

.aurora__item:nth-of-type(1) {
  top: -50%;
  animation: aurora-border 6s ease-in-out infinite,
    aurora-1 12s ease-in-out infinite alternate;
}

.aurora__item:nth-of-type(2) {
  background-color: var(--clr-3);
  right: 0;
  top: 0;
  animation: aurora-border 6s ease-in-out infinite,
    aurora-2 12s ease-in-out infinite alternate;
}

.aurora__item:nth-of-type(3) {
  background-color: var(--clr-2);
  left: 0;
  bottom: 0;
  animation: aurora-border 6s ease-in-out infinite,
    aurora-3 8s ease-in-out infinite alternate;
}

.aurora__item:nth-of-type(4) {
  background-color: var(--clr-4);
  right: 0;
  bottom: -50%;
  animation: aurora-border 6s ease-in-out infinite,
    aurora-4 24s ease-in-out infinite alternate;
}

@keyframes aurora-1 {
  0% {
    top: 0;
    right: 0;
  }

  50% {
    top: 100%;
    right: 75%;
  }

  75% {
    top: 100%;
    right: 25%;
  }

  100% {
    top: 0;
    right: 0;
  }
}

@keyframes aurora-2 {
  0% {
    top: -50%;
    left: 0%;
  }

  60% {
    top: 100%;
    left: 75%;
  }

  85% {
    top: 100%;
    left: 25%;
  }

  100% {
    top: -50%;
    left: 0%;
  }
}

@keyframes aurora-3 {
  0% {
    bottom: 0;
    left: 0;
  }

  40% {
    bottom: 100%;
    left: 75%;
  }

  65% {
    bottom: 40%;
    left: 50%;
  }

  100% {
    bottom: 0;
    left: 0;
  }
}

@keyframes aurora-4 {
  0% {
    bottom: -50%;
    right: 0;
  }

  50% {
    bottom: 0%;
    right: 40%;
  }

  90% {
    bottom: 50%;
    right: 25%;
  }

  100% {
    bottom: -50%;
    right: 0;
  }
}

@keyframes aurora-border {
  0% {
    border-radius: 37% 29% 27% 27% / 28% 25% 41% 37%;
  }

  25% {
    border-radius: 47% 29% 39% 49% / 61% 19% 66% 26%;
  }

  50% {
    border-radius: 57% 23% 47% 72% / 63% 17% 66% 33%;
  }

  75% {
    border-radius: 28% 49% 29% 100% / 93% 20% 64% 25%;
  }

  100% {
    border-radius: 37% 29% 27% 27% / 28% 25% 41% 37%;
  }
}

        </style>
        <section id="slider-area">
            <div class="slider-active-wrap owl-carousel text-center text-md-start">

                <div class="single-slide-wrap slide-bg-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <div class="content">
                                        <h1 class="title">Muslim <br>Industrialists <span>And</span> <br>Merchants <br>Association
                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="single-slide-wrap slide-bg-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                <div class="content">
                                <h1 class="title">Muslim <br>Industrialists <span>And</span> <br>Merchants <br>Association
                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slide-wrap slide-bg-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                <div class="content">
                                <h1 class="title">Muslim <br>Industrialists <span>And</span> <br>Merchants <br>Association
                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="social-networks-icon">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i> <span>7.2k Likes</span></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> <span>3.2m Followers</span></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i> <span>7.2k Likes</span></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i> <span>2.2k Subscribers</span></a></li>
                </ul>
            </div>

        </section>
