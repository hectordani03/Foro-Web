/* ----------------------------------MODAL DE USER AGREEMENT ---------------------------------- */
const agreementBtn = document.getElementById("agreementButton");
  if (agreementBtn) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("userAgreementId");
    const content = document.getElementById("body-content");

    agreementBtn.addEventListener("click", (e) => {
      $section.innerHTML = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="/app/css/styles.css">
            <style>
                .btn {
                    background-color: rgb(72, 143, 231);
                    color: white;
                    padding: 10px 20px;
                    font-size: 16px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                }
            
                .btn:hover {
                    background-color: rgb(41, 114, 202);
                }
            </style>
        </head>
        <body>
        <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 dark:bg-opacity-20 transition-opacity"></div>
              
            <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-7/12 mx-auto h-screen flex flex-col fixed">
        
            <div class="flex justify-between fixed w-7/12 z-50 bg-gray-100 dark:bg-slate-700 shadow-lg pb-4">
            <h1 class="text-black flex text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <p class="font-bold text-xl mt-5 dark:text-white">User Agreement</p>
            <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
            </svg>
            </div>
            </div>
            <hr class="w-full mt-5">
        
            <div id="card-scrollbar" class="overflow-y-auto z-40 h-auto relative mt-6">
            <div class="bg-gray-100 w-10/12 rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100 mx-auto">
            <div id="capa" class="bg-gray-500 opacity-30 w-full h-full absolute hidden rounded-xl transition ease-in z-50"></div>
            <!-- TOP CARD CONTENT -->
        
            <!-- CARD MENU -->
            <div class="absolute right-5 top-0">
                            </div>
                            </div>
                            <!-- CARD CONTENT -->
                            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8 text-justify">Welcome to For Us. Before accessing and participating in the Forum, you must read and agree to the following User Agreement. By registering or using the Forum, you acknowledge that you have read, understood, and agree to be bound by this User Agreement.
        
                            1. User Conduct
                            As a user of the Forum, you agree to:
                            
                            Respect all participants and engage in civil discourse.
                            Refrain from posting any content that is offensive, discriminatory, hateful, or violates any laws.
                            Not engage in any form of harassment, trolling, or disruptive behavior.
                            Avoid sharing personal information of others without their explicit consent.
                            Not use the Forum for any illegal or unauthorized purposes.
                            2. Content Ownership and Rights
                            You retain ownership of the content you post. However, by posting content on the Forum, you grant the Forum a non-exclusive, royalty-free, worldwide license to use, display, reproduce, and distribute your content.
                            You warrant that you have the rights to post any content you share and that it does not infringe on the rights of any third party.
                            3. Privacy
                            Your privacy is important to us. Please review our Privacy Policy, which explains how we collect, use, and protect your information.
                            By using the Forum, you consent to the collection and use of your information as outlined in the Privacy Policy.
                            4. Moderation
                            The Forum reserves the right to moderate all content and remove any posts that violate this User Agreement.
                            Users who repeatedly violate the User Agreement may be banned or suspended from the Forum at the discretion of the moderators.
                            5. Termination
                            The Forum reserves the right to terminate or suspend your access at any time, for any reason, without prior notice.
                            You may terminate your account at any time by following the instructions on the Forum.
                            6. Disclaimers
                            The Forum is provided on an "as-is" basis. The Forum disclaims all warranties, express or implied, including but not limited to, implied warranties of merchantability and fitness for a particular purpose.
                            The Forum does not guarantee the accuracy, completeness, or usefulness of any content.
                            7. Limitation of Liability
                            The Forum shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or relating to your use of the Forum.
                            8. Changes to the Agreement
                            The Forum reserves the right to modify this User Agreement at any time. Changes will be effective immediately upon posting on the Forum. Your continued use of the Forum after any changes signifies your acceptance of the revised Agreement.
                            9. Governing Law
                            This User Agreement shall be governed by and construed in accordance with the laws of the jurisdiction in which the Forum operates, without regard to its conflict of law provisions.
                            Acceptance
                            By accessing and using the Forum, you acknowledge that you have read, understood, and agree to be bound by this User Agreement. If you do not agree with any part of this Agreement, you must not use the Forum.
                            
                            Thank you for being a part of our community and contributing to us.</p>
                    </div>
                    <hr class="w-full mt-5 dark:border-slate-800">
                    <div id = "close4" class="btn mr-10 ml-10 mb-5 mt-5">I agree</div>      
                            </div>
                            </div>
                            </section>
                            </section>
                          
        </body>
        </html>
        `;

      const textArea = document.querySelector("textarea");

      textArea.addEventListener("focus", function () {
        if (this.value === "Write a Comment...") {
          this.value = "";
        }
      });
      textArea.addEventListener("blur", function () {
        if (this.value === "") {
          this.value = "Write a Comment...";
        }
      });

      const closeM = document.getElementById("close");
      const modal = document.getElementById("modal");
      const capa = document.getElementById("capa");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });

      const closeM4 = document.getElementById("close4");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM4.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });
    });
  });
}
