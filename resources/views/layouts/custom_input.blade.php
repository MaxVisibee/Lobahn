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
