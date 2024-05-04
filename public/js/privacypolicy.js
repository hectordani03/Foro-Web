const privacyBtn = document.getElementById("privacy-button");
if (privacyBtn) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("privacyId");
    const content = document.getElementById("body-content");

    privacyBtn.addEventListener("click", (e) => {
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

        <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 dark:bg-opacity-40 transition-opacity"></div>
      
              
            <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-7/12 mx-auto h-screen flex flex-col fixed">
        
            <div class="flex justify-between fixed w-7/12 z-50 bg-gray-100 dark:bg-slate-700 shadow-lg pb-4">
            <h1 class="text-black flex text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <p class="font-bold text-xl mt-5 dark:text-white">Privacy Policy</p>
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
                            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">Welcome to our forum dedicated to discussing the objectives of the United Nations (UN) and related global matters. At our forum, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data:

                                1. Information Collection:
                                We collect information that you voluntarily provide when registering an account, participating in discussions, or interacting with our forum features. This may include your name, email address, profile information, and any content you submit.
                                
                                2. Usage of Information:
                                Your information is used to personalize your experience on the forum, facilitate communication, and improve our services. We may also analyze user trends and behavior to enhance the functionality and relevance of the forum.
                                
                                3. Data Security:
                                We implement industry-standard security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee absolute security.
                                
                                4. Cookies and Tracking Technologies:
                                We may use cookies and similar tracking technologies to enhance your browsing experience, analyze usage patterns, and personalize content. You have the option to disable cookies in your browser settings, but this may limit certain features of the forum.
                                
                                5. Third-Party Links:
                                Our forum may contain links to third-party websites or services for additional resources or information. We are not responsible for the privacy practices or content of these external sites and encourage you to review their privacy policies before providing any personal information.
                                
                                6. Children's Privacy:
                                Our forum is not directed towards individuals under the age of 13, and we do not knowingly collect personal information from children. If we become aware that a child under 13 has provided us with personal information, we will promptly delete it from our records.
                                
                                7. Updates to Privacy Policy:
                                We may update this Privacy Policy periodically to reflect changes in our practices or legal requirements. We will notify you of any significant updates through the forum or via email. Your continued use of the forum after such changes constitutes acceptance of the updated Privacy Policy.
                                
                                8. Contact Us:
                                If you have any questions, concerns, or requests regarding our Privacy Policy or the handling of your personal information, please contact us at [contact email or form].
                                
                                By using our forum, you consent to the collection and use of your information as outlined in this Privacy Policy. We are committed to maintaining the confidentiality and integrity of your data while providing a valuable platform for discussing UN objectives and global issues.
                                
                                Thank you for being a part of our community.</p>
                    </div>
                    <hr class="w-full mt-5">
                    <div id = "close2" class="btn mr-10 ml-10 mb-5 mt-5">I agree</div>       
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

      const closeM2 = document.getElementById("close2");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM2.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });
    });
  });
}
