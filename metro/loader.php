<style>
   /* Colors */
   .loading-flag--wrapper {
    width: 100%;
    height: 100vh;
    }
    .loading-flag--content {
    position: absolute;
    display: flex;
    width: 204px;
    flex-flow: wrap;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    }
    .loading-flag--flag {
    width: 100px;
    height: 100px;
    display: inline-block;
    margin-bottom: 12px;
    margin-right: 2px;
    opacity: 0;
    -webkit-animation: fade-in 0.3s ease-in forwards;
            animation: fade-in 0.3s ease-in forwards;
    }
    .loading-flag--flag:first-child .stripe {
    background-color: #f35326;
    }
    .loading-flag--flag:nth-child(2) .stripe {
    background-color: #81bb07;
    }
    .loading-flag--flag:nth-child(3) .stripe {
    background-color: #00a6f0;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(1) {
    -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(2) {
    -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(3) {
    -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(4) {
    -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(5) {
    -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(6) {
    -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(7) {
    -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
    }
    .loading-flag--flag:nth-child(odd) .stripe:nth-child(8) {
    -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(1) {
    -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(2) {
    -webkit-animation-delay: -1s;
            animation-delay: -1s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(3) {
    -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(4) {
    -webkit-animation-delay: -1.2s;
            animation-delay: -1.2s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(5) {
    -webkit-animation-delay: -1.3s;
            animation-delay: -1.3s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(6) {
    -webkit-animation-delay: -1.4s;
            animation-delay: -1.4s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(7) {
    -webkit-animation-delay: -1.5s;
            animation-delay: -1.5s;
    }
    .loading-flag--flag:nth-child(even) .stripe:nth-child(8) {
    -webkit-animation-delay: -1.6s;
            animation-delay: -1.6s;
    }
    .loading-flag--flag .stripe {
    width: 8px;
    height: 100px;
    background: #ffba0b;
    display: inline-block;
    -webkit-animation: slide 0.8s ease-in-out infinite alternate;
            animation: slide 0.8s ease-in-out infinite alternate;
    }
    @-webkit-keyframes slide {
    to {
        -webkit-transform: translateY(20%);
                transform: translateY(20%);
    }
    }
    @keyframes slide {
    to {
        -webkit-transform: translateY(20%);
                transform: translateY(20%);
    }
    }
    @-webkit-keyframes fade-in {
    to {
        opacity: 1;
    }
    }
    @keyframes fade-in {
    to {
        opacity: 1;
    }
    }
</style>

    <div id="preloader">
    <div class="loading-flag--wrapper">
      <div class="loading-flag--content">
        <div class="loading-flag--flag">
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
        </div>
        <div class="loading-flag--flag">
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
        </div>
        <div class="loading-flag--flag">
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
        </div>
        <div class="loading-flag--flag">
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
          <div class="stripe"></div>
        </div>
      </div>
    </div>
    </div>
