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
            if(attrs[j].includes('date') && nodeLists[j][i].value){
                dataObj[`${attrs[j]}`] = formatDate(nodeLists[j][i].value);
            } else {
                dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
            }
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
                subItemElem.innerHTML = `${listItem[key]} - `;
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

const printCV = () => {
    window.print();
}

// const clearCV = () => {
//     mainForm.reset();
//     nameDsp.innerHTML = "";
//     jobDsp.innerHTML = "";
//     phonenoDsp.innerHTML = "";
//     emailDsp.innerHTML = "";
//     addressDsp.innerHTML = "";
//     summaryDsp.innerHTML = "";
//     projectsDsp.innerHTML = "";
//     achievementsDsp.innerHTML = "";
//     skillsDsp.innerHTML = "";
//     educationsDsp.innerHTML = "";
//     experiencesDsp.innerHTML = "";
// }

const saveCV = () => {
    Swal.fire({
        title: "Do you want to save the changes?",
        showCancelButton: true,
        confirmButtonText: "Save",
        customClass: {
            popup : 'custom-swal-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            createCV();
        }
    });
}

const createCV = () => {
    const userData = getUserInput();
    const urlParams = new URLSearchParams(window.location.search);
    const templateId = urlParams.get('id');

    $.ajax({
        url: '/cv-builder/api/cv.api.php',
        method: 'POST',
        dataType: "json",
        data: {
            action: 'create_cv',
            template_id: templateId,
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
                    window.location.href = '/cv-builder/index.php?page=my-cv';
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