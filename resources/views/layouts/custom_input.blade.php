  {{-- <div class="fixed top-0 w-full h-screen hidden left-0 z-50 bg-black-opacity" id="new-data-popup">
      <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
          <div
              class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
              <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">MAKE A NEW DATA</h1>
              <p class="text-gray-pale popup-text-box__description connect-employer-text-box">By clicking on "YES", your
                  new data will be collected to LOBAHN CONNECT. </p>
              <p class="text-gray-pale popup-text-box__description mb-4">Do you wish to proceed?</p>
              <div class="button-bar button-bar--width mt-4">
                  <button id="custom-answer-submit"
                      class="btn-bar focus:outline-none text-gray bg-lime-orange text-sm lg:text-lg hover:text-lime-orange hover:bg-transparent border border-lime-orange rounded-corner py-2 px-4 mr-2">YES</button>
                  <button id="custom-answer-cancel"
                      class="btn-bar focus:outline-none text-gray-pale bg-smoke-dark text-sm lg:text-lg hover:bg-transparent border border-smoke-dark rounded-corner py-2 px-4">NO</button>
              </div>
          </div>
      </div>
  </div> --}}

  <!-- Custom input success pop-up-->
  <div class="fixed top-0 w-full h-screen left-0 hidden z-[9999] bg-black-opacity" id="custom-answer-popup">
      <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
          <div
              class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-10 pb-12 relative">
              <p class="custom-answer-approve-msg text-white text-lg my-2">Thank you for your suggested
                  addition to our matching list. </p>
              <p class="custom-answer-approve-msg text-white text-lg my-2"> We will review and include it within 24
                  hours.</p>

              <button type="button" id="custom-answer-popup-close-btn"
                  class="bg-lime-orange text-gray text-lg px-8 py-1 rounded-md cursor-pointer focus:outline-none mt-4"
                  onclick="closeCustomAnswerPopup()">
                  OK
              </button>
          </div>
      </div>
  </div>
