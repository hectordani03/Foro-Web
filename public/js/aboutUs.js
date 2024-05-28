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