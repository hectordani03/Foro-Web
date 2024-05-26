/* ---------------------------------- MODAL DE CONTENT POLICY ---------------------------------- */
const contentBtn = document.getElementById("content-button");
if (contentBtn) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("contentId");
    const content = document.getElementById("body-content");

    contentBtn.addEventListener("click", (e) => {
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
            <p class="font-bold text-xl mt-5 dark:text-white">Content Policy</p>
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
                            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8 text-justify">Welcome to our forum dedicated to discussing the objectives of the United Nations (UN) and related global matters. To maintain a constructive and respectful environment for all participants, we have established the following content policy guidelines:
        
                                1. Respectful Discourse:
                                We encourage open dialogue and diverse perspectives on UN objectives and global issues. Participants are expected to engage in discussions with respect for others' opinions, backgrounds, and identities. Personal attacks, harassment, hate speech, or any form of discrimination will not be tolerated.
                                
                                2. Factual Accuracy:
                                Discussions should be grounded in factual information. Misleading or false claims, conspiracy theories, or deliberate misinformation that could undermine the understanding of UN objectives or global challenges are not permitted.
                                
                                3. Civil Behavior:
                                Civil behavior is essential for productive discussions. Participants should refrain from disruptive behavior such as trolling, spamming, or intentionally derailing conversations. Constructive criticism is welcomed, but disruptive conduct will be addressed by moderators.
                                
                                4. Relevant Content:
                                Content posted on this forum should relate to the objectives, initiatives, and activities of the United Nations. While tangential topics may be allowed if they contribute to a broader understanding of global issues, unrelated content, promotions, or advertisements will be removed.
                                
                                5. Intellectual Property:
                                Respect intellectual property rights when sharing content. Users must ensure they have the necessary permissions or rights to share copyrighted materials. Plagiarism and unauthorized distribution of content will not be tolerated.
                                
                                6. Privacy and Confidentiality:
                                Protect the privacy and confidentiality of individuals and sensitive information. Avoid sharing personal information without consent, and refrain from disclosing confidential or proprietary details related to UN operations or diplomatic efforts.
                                
                                7. Compliance with Legal Requirements:
                                Participants are expected to comply with all applicable laws and regulations when posting content on this forum. Illegal activities, including but not limited to advocating violence, promoting illegal substances, or engaging in unlawful behavior, are strictly prohibited.
                                
                                8. Moderation and Enforcement:
                                Our moderators are entrusted with maintaining the integrity of discussions and enforcing these content policies. They reserve the right to edit or remove content that violates these guidelines, and repeated violations may result in warnings, temporary suspensions, or permanent bans from the forum.
                                
                                By participating in this forum, you agree to abide by these content policies. We believe that fostering a respectful and informed community will contribute to meaningful discussions about the objectives of the United Nations and our collective efforts towards global progress.
                                
                                Thank you for your cooperation and commitment to constructive engagement.</p>
                    </div>
                    <hr class="w-full mt-5 dark:border-slate-800">
                    <div id = "close3" class="btn mr-10 ml-10 mb-5 mt-5">I agree</div>      
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

      const closeM3 = document.getElementById("close3");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM3.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });
    });
  });
}

/* ----------------------------------MODAL DE PRIVACY POLICY ---------------------------------- */
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

        <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 dark:bg-opacity-20 transition-opacity"></div>
      
              
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
                            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8 text-justify">Welcome to our forum dedicated to discussing the objectives of the United Nations (UN) and related global matters. At our forum, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data:

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
                    <hr class="w-full mt-5 dark:border-slate-800  ">
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
/* ----------------------------------MODAL DE USER AGREEMENT ---------------------------------- */
const agreementBtn = document.getElementById("agreement-button");
  if (agreementBtn) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("agreementId");
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

/* ---------------------------------- MODAL DE ABOUT US ---------------------------------- */
const aboutBtn = document.getElementById("about-button");
if (aboutBtn) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("aboutId");
    const content = document.getElementById("body-content");

    aboutBtn.addEventListener("click", (e) => {
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
            <p class="font-bold text-xl mt-5 dark:text-white">About Us</p>
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
                            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8 text-justify">Our vision is to create a global community united by a shared commitment to the United Nations' Sustainable Development Goals (SDGs). We strive to be the leading platform where individuals, organizations, and communities can engage in meaningful discussions, share insights, and collaborate on initiatives that advance these critical objectives.

                            Mission
                            Our mission is to provide an inclusive, accessible, and engaging online forum dedicated to fostering dialogue and action around the UN SDGs. We aim to empower our members by:
                            
                            Facilitating the exchange of knowledge and ideas through thoughtful discussions and expert insights.
                            Encouraging collaboration between diverse stakeholders, including policymakers, academics, activists, and citizens.
                            Promoting awareness and understanding of the SDGs to inspire collective action and drive sustainable change.
                            Objectives
                            Raise Awareness: Educate our community about the importance and intricacies of the UN SDGs, highlighting their relevance to everyday life and global well-being.
                            
                            Foster Engagement: Create a dynamic space for conversations that encourage active participation, critical thinking, and the sharing of diverse perspectives on sustainable development.
                            
                            Support Collaboration: Connect like-minded individuals and organizations to foster partnerships, projects, and initiatives that contribute to achieving the SDGs.
                            
                            Share Resources: Provide access to a wide range of resources, including research articles, case studies, and best practices, to support informed decision-making and effective action.
                            
                            Amplify Voices: Ensure that marginalized and underrepresented communities have a platform to voice their experiences and solutions, promoting equity and inclusivity in our discussions and actions.
                            
                            By working together, we believe that we can accelerate progress toward a more just, sustainable, and prosperous world. Join us in our mission to turn the vision of the UN SDGs into reality. Together, we can make a difference.</p>
                    </div>
                    <hr class="w-full mt-5 dark:border-slate-800  ">
                    <div id = "close5" class="btn mr-10 ml-10  mt-5">Ok</div>       
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

      const closeM5 = document.getElementById("close5");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM5.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });
    });
  });
}

/* ---------------------------------- MODAL DE NOTIFICACIONES ---------------------------------- */
document.addEventListener('DOMContentLoaded', function () {
  const bellIcon = document.getElementById('bell-icon');
  const bellActive = document.getElementById('bell-active');
  const bellInactive = document.getElementById('bell-inactive');
  const modal = document.getElementById('notification-modal');
  const closeModalButton = document.getElementById('close-modal');
  const notificationStatus = document.getElementById('notification-status');

  bellIcon.addEventListener('click', function () {
    const isActive = bellActive.classList.contains('hidden');

    if (isActive) {
      bellActive.classList.remove('hidden');
      bellInactive.classList.add('hidden');
      notificationStatus.textContent = 'activated';
    } else {
      bellActive.classList.add('hidden');
      bellInactive.classList.remove('hidden');
      notificationStatus.textContent = 'deactivated';
    }

    modal.classList.remove('hidden');
  });

  closeModalButton.addEventListener('click', function () {
    modal.classList.add('hidden');
  });
});

/* ---------------------------------- MODAL DE INTERACCION DE PUBLICACIONES ---------------------------------- */
