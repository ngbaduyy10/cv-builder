const mainForm = document.getElementById('cv-form');

// user inputs elements
let cvnameElem = mainForm.cvname,
    firstnameElem = mainForm.firstname,
    lastnameElem = mainForm.lastname,
    imageElem = mainForm.image,
    jobElem = mainForm.job,
    addressElem = mainForm.address,
    emailElem = mainForm.email,
    phonenoElem = mainForm.phoneno,
    summaryElem = mainForm.summary;

// text editor elements
let summaryEditorElem = document.querySelector("#summary-content");

// display elements
let nameDsp = document.getElementById('fullname_dsp'),
    imageDsp = document.getElementById('image_dsp'),
    jobDsp = document.getElementById('job_dsp'),
    phonenoDsp = document.getElementById('phoneno_dsp'),
    emailDsp = document.getElementById('email_dsp'),
    addressDsp = document.getElementById('address_dsp'),
    summaryDsp = document.getElementById('summary_dsp'),
    projectsDsp = document.getElementById('projects_dsp'),
    achievementsDsp = document.getElementById('achievements_dsp'),
    skillsDsp = document.getElementById('skills_dsp'),
    educationsDsp = document.getElementById('educations_dsp'),
    experiencesDsp = document.getElementById('experiences_dsp');

function formatDate(dateString) {
    const date = new Date(dateString);
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const month = months[date.getMonth()];
    const year = date.getFullYear();
    return `${month} ${year}`;
}

// first value is for the attributes and second one passes the nodelists
const fetchValues = (attrs, ...nodeLists) => {
    let elemsAttrsCount = nodeLists.length;
    let elemsDataCount = nodeLists[0].length;
    let tempDataArr = [];

    for(let i = 0; i < elemsDataCount; i++){
        let dataObj = {};
        for(let j = 0; j < elemsAttrsCount; j++) {
            dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
        }
        tempDataArr.push(dataObj);
    }

    return tempDataArr;
}

const getUserInput = () => {
    // achievements
    let achievementsTitleElem = document.querySelectorAll('.achieve_title'),
        achievementsDescriptionElem = document.querySelectorAll('.achieve_description');

    // experiences
    let expTitleElem = document.querySelectorAll('.exp_title'),
        expOrganizationElem = document.querySelectorAll('.exp_organization'),
        expStartDateElem = document.querySelectorAll('.exp_start_date'),
        expEndDateElem = document.querySelectorAll('.exp_end_date'),
        expDescriptionElem = document.querySelectorAll('.exp_description');

    // education
    let eduSchoolElem = document.querySelectorAll('.edu_school'),
        eduDegreeElem = document.querySelectorAll('.edu_degree'),
        eduStartDateElem = document.querySelectorAll('.edu_start_date'),
        eduGraduationDateElem = document.querySelectorAll('.edu_graduation_date');

    let projTitleElem = document.querySelectorAll('.proj_title'),
        projDescriptionElem = document.querySelectorAll('.proj_description');

    let skillElem = document.querySelectorAll('.skill');

    return {
        cvname: cvnameElem.value,
        firstname: firstnameElem.value,
        lastname: lastnameElem.value,
        job: jobElem.value,
        address: addressElem.value,
        email: emailElem.value,
        phoneno: phonenoElem.value,
        summary: summaryElem.value,
        achievements: fetchValues(['achieve_title', 'achieve_description'], achievementsTitleElem, achievementsDescriptionElem),
        experiences: fetchValues(['exp_title', 'exp_start_date', 'exp_end_date','exp_organization', 'exp_description'], expTitleElem, expStartDateElem, expEndDateElem, expOrganizationElem, expDescriptionElem),
        educations: fetchValues(['edu_school', 'edu_start_date', 'edu_graduation_date', 'edu_degree'], eduSchoolElem, eduStartDateElem, eduGraduationDateElem, eduDegreeElem),
        projects: fetchValues(['proj_title', 'proj_description'], projTitleElem, projDescriptionElem),
        skills: fetchValues(['skill'], skillElem)
    }
}

// show the list data
const showListData = (listData, listContainer) => {
    listContainer.innerHTML = "";
    listData.forEach(listItem => {
        let itemElem = document.createElement('div');
        itemElem.classList.add('preview-item');

        for(const key in listItem){
            let subItemElem = document.createElement('span');
            subItemElem.classList.add('preview-item-val');
            if (key.includes('start_date') && listItem[key]) {
                subItemElem.innerHTML = `${formatDate(listItem[key])} - `;
            } else if ((key.includes('end_date') || key.includes('graduation_date')) && listItem[key]) {
                subItemElem.innerHTML += `${formatDate(listItem[key])}`;
            } else {
                subItemElem.innerHTML = `${listItem[key]}`;
            }
            itemElem.appendChild(subItemElem);
        }

        listContainer.appendChild(itemElem);
    })
}

const displayCV = (userData) => {
    nameDsp.innerHTML = userData.firstname + " " + userData.lastname;
    if (userData.image) {
        imageDsp.src = userData.image;
    }
    jobDsp.innerHTML = userData.job;
    phonenoDsp.innerHTML = userData.phoneno;
    emailDsp.innerHTML = userData.email;
    addressDsp.innerHTML = userData.address;
    summaryDsp.innerHTML = userData.summary;
    showListData(userData.projects, projectsDsp);
    showListData(userData.achievements, achievementsDsp);
    showListData(userData.skills, skillsDsp);
    showListData(userData.educations, educationsDsp);
    showListData(userData.experiences, experiencesDsp);
}

const generateCV = () => {
    const userData = getUserInput();
    displayCV(userData);
}

function previewImage(){
    let oFReader = new FileReader();
    oFReader.readAsDataURL(imageElem.files[0]);
    oFReader.onload = function(ofEvent){
        imageDsp.src = ofEvent.target.result;
    }
}

const revertCV = () => {
    Swal.fire({
        title: "Do you want to revert the changes?",
        showCancelButton: true,
        confirmButtonText: "Revert",
        customClass: {
            popup : 'custom-swal-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const urlParams = new URLSearchParams(window.location.search);
            const cvId = urlParams.get('cv_id');

            if (cvId) {
                fetchCV(cvId);
            }
        }
    });
}

const printCV = () => {
    window.print();
}

const insertCV = (cvData) => {
    for (let i = 0; i < cvData.educations.length - 1; i++) {
        $('.education-data [data-repeater-create]').click();
    }
    for (let i = 0; i < cvData.experiences.length - 1; i++) {
        $('.experience-data [data-repeater-create]').click();
    }
    for (let i = 0; i < cvData.projects.length - 1; i++) {
        $('.project-data [data-repeater-create]').click();
    }
    for (let i = 0; i < cvData.skills.length - 1; i++) {
        $('.skill-data [data-repeater-create]').click();
    }
    for (let i = 0; i < cvData.achievements.length - 1; i++) {
        $('.achievement-data [data-repeater-create]').click();
    }
    // set the values for education, experience, project, skill, and achievement
    let eduSchoolElem = document.querySelectorAll('.edu_school'),
        eduDegreeElem = document.querySelectorAll('.edu_degree'),
        eduStartDateElem = document.querySelectorAll('.edu_start_date'),
        eduGraduationDateElem = document.querySelectorAll('.edu_graduation_date');

    let expTitleElem = document.querySelectorAll('.exp_title'),
        expOrganizationElem = document.querySelectorAll('.exp_organization'),
        expStartDateElem = document.querySelectorAll('.exp_start_date'),
        expEndDateElem = document.querySelectorAll('.exp_end_date'),
        expDescriptionElem = document.querySelectorAll('.exp_description'),
        expDescriptionEditorElem = document.querySelectorAll('#experience-content');

    let projTitleElem = document.querySelectorAll('.proj_title'),
        projDescriptionElem = document.querySelectorAll('.proj_description'),
        projDescriptionEditorElem = document.querySelectorAll('#project-content');

    let skillElem = document.querySelectorAll('.skill');

    let achievementsTitleElem = document.querySelectorAll('.achieve_title'),
        achievementsDescriptionElem = document.querySelectorAll('.achieve_description'),
        achievementsDescriptionEditorElem = document.querySelectorAll('#achievement-content');

    for (let i = 0; i < cvData.educations.length; i++) {
        eduSchoolElem[i].value = cvData.educations[i].edu_school;
        eduDegreeElem[i].value = cvData.educations[i].edu_degree;
        eduStartDateElem[i].value = cvData.educations[i].edu_start_date;
        eduGraduationDateElem[i].value = cvData.educations[i].edu_graduation_date;
    }

    for (let i = 0; i < cvData.experiences.length; i++) {
        expTitleElem[i].value = cvData.experiences[i].exp_title;
        expOrganizationElem[i].value = cvData.experiences[i].exp_organization;
        expStartDateElem[i].value = cvData.experiences[i].exp_start_date;
        expEndDateElem[i].value = cvData.experiences[i].exp_end_date;
        expDescriptionElem[i].value = cvData.experiences[i].exp_description;
        expDescriptionEditorElem[i].innerHTML = cvData.experiences[i].exp_description;
    }

    for (let i = 0; i < cvData.projects.length; i++) {
        projTitleElem[i].value = cvData.projects[i].proj_title;
        projDescriptionElem[i].value = cvData.projects[i].proj_description;
        projDescriptionEditorElem[i].innerHTML = cvData.projects[i].proj_description;
    }

    for (let i = 0; i < cvData.skills.length; i++) {
        skillElem[i].value = cvData.skills[i].skill;
    }

    for (let i = 0; i < cvData.achievements.length; i++) {
        achievementsTitleElem[i].value = cvData.achievements[i].achieve_title;
        achievementsDescriptionElem[i].value = cvData.achievements[i].achieve_description;
        achievementsDescriptionEditorElem[i].innerHTML = cvData.achievements[i].achieve_description;
    }


    cvnameElem.value = cvData.cvname;
    firstnameElem.value = cvData.firstname;
    lastnameElem.value = cvData.lastname;
    jobElem.value = cvData.job;
    addressElem.value = cvData.address;
    emailElem.value = cvData.email;
    phonenoElem.value = cvData.phoneno;
    summaryElem.value = cvData.summary;
    summaryEditorElem.innerHTML = cvData.summary;

    displayCV(cvData);
}

const fetchCV = (cvId) => {
    $.ajax({
        url: 'api/cv.api.php',
        method: 'GET',
        dataType: 'json',
        data: {
            action: 'get_cv_by_id',
            id: cvId
        },
        success: function(response){
            if (response.success) {
                const cvData = {
                    ...response.data,
                    educations: JSON.parse(response.data.educations),
                    experiences: JSON.parse(response.data.experiences),
                    projects: JSON.parse(response.data.projects),
                    skills: JSON.parse(response.data.skills),
                    achievements: JSON.parse(response.data.achievements),
                };

                insertCV(cvData);
            }
        }
    });
}

$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const cvId = urlParams.get('cv_id');

    if (cvId) {
        fetchCV(cvId);
    }
});

const createCV = async (userData) => {
    const urlParams = new URLSearchParams(window.location.search);
    const templateId = urlParams.get('template_id');

    if (imageElem.files[0]) {
        userData.image = await uploadToCloudinary(imageElem.files[0]);
    }

    const cvImage = await getCVImage();

    $.ajax({
        url: 'api/cv.api.php',
        method: 'POST',
        dataType: "json",
        data: {
            action: 'create_cv',
            template_id: templateId,
            cv_image: cvImage,
            ...userData,
            educations: JSON.stringify(userData.educations),
            experiences: JSON.stringify(userData.experiences),
            projects: JSON.stringify(userData.projects),
            skills: JSON.stringify(userData.skills),
            achievements: JSON.stringify(userData.achievements)
        },
        success: function(response){
            if (response.success) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'custom-swal-size',
                    }
                });
                setTimeout(() => {
                    window.location.href = 'index.php?page=my-cv';
                }, 1500);
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 2000,
                    customClass: {
                        popup: 'toast-size',
                    }
                });
            }
        }
    });
}

const updateCV = async (userData) => {
    const urlParams = new URLSearchParams(window.location.search);
    const cvId = urlParams.get('cv_id');
    const templateId = urlParams.get('template_id');

    if (imageElem.files[0]) {
        userData.image = await uploadToCloudinary(imageElem.files[0]);
    } else if (imageDsp) {
        userData.image = imageDsp.src;
    }

    const cvImage = await getCVImage();

    $.ajax({
        url: 'api/cv.api.php',
        method: 'POST',
        dataType: "json",
        data: {
            action: 'update_cv',
            id: cvId,
            template_id: templateId,
            cv_image: cvImage,
            ...userData,
            educations: JSON.stringify(userData.educations),
            experiences: JSON.stringify(userData.experiences),
            projects: JSON.stringify(userData.projects),
            skills: JSON.stringify(userData.skills),
            achievements: JSON.stringify(userData.achievements)
        },
        success: function(response){
            if (response.success) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'custom-swal-size',
                    }
                });
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 2000,
                    customClass: {
                        popup: 'toast-size',
                    }
                });
            }
        }
    });
}

const saveCV = () => {
    const userData = getUserInput();

    if (userData.cvname === "") {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "Please enter a CV name",
            showConfirmButton: false,
            showCloseButton: true,
            timer: 2000,
            customClass: {
                popup: 'toast-size',
            }
        });
        return;
    }

    Swal.fire({
        title: "Do you want to save the changes?",
        showCancelButton: true,
        confirmButtonText: "Save",
        customClass: {
            popup : 'custom-swal-size'
        }
    }).then(async (result) => {
        if (result.isConfirmed) {
            //set button to loading
            const saveBtn = document.querySelector("#save-cv-btn");
            saveBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
            saveBtn.setAttribute("disabled", "disabled");

            const urlParams = new URLSearchParams(window.location.search);
            const cvId = urlParams.get('cv_id');
            if (cvId) {
                await updateCV(userData);
            } else {
                await createCV(userData);
            }

            //reset button
            saveBtn.innerHTML = `<i class='bx bxs-save'></i> Save`;
            saveBtn.removeAttribute("disabled");
        }
    });
}

const getCVImage = async () => {
    //fix the preview-sc size
    const previewSc = document.querySelector("#preview-sc");
    previewSc.style.width = "793.5px";
    document.documentElement.style.fontSize = "76%";

    // Create a promise to wrap html2canvas usage
    return new Promise((resolve, reject) => {
        html2canvas(document.querySelector("#preview-sc"), {
            logging: true,
            useCORS: true,
            allowTaint: true,
        }).then(canvas => {
            canvas.toBlob(async (blob) => {
                try {
                    const cvImage = await uploadToCloudinary(blob);
                    resolve(cvImage);
                } catch (err) {
                    reject(new Error("Error uploading canvas image to Cloudinary"));
                }
            });
        }).catch(err => {
            reject(new Error("Error generating canvas image"));
        }).finally(
            () => {
                previewSc.style.width = "";
                document.documentElement.style.fontSize = "62.5%";
            }
        );
    });
}

const uploadToCloudinary = async (file) => {
    let imageUrl = "";
    let formData = new FormData();
    formData.append('file', file);
    formData.append('upload_preset', 'cv_avatar');

    await $.ajax({
        url: `https://api.cloudinary.com/v1_1/doxm7rnpk/upload`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            imageUrl = response.secure_url;
        },
        error: function(error) {
            console.error("Error uploading image:", error);
        }
    });

    return imageUrl;
}

function formatDoc(cmd) {
    const sel = window.getSelection();
    if (sel.rangeCount > 0) {
        if (cmd === 'bold') {
            document.execCommand('bold');
        } else if (cmd === 'underline') {
            document.execCommand('underline');
        } else if (cmd === 'insertOrderedList') {
            document.execCommand('insertOrderedList');
        } else if (cmd === 'insertUnorderedList') {
            document.execCommand('insertUnorderedList');
        }
    }
}
$(document).ready(function() {
    $(document).on('input', '.editor-content', function() {
        const textarea = $(this).closest('.form-elem').find('textarea');
        textarea.val($(this).html());
        generateCV();
    })
});