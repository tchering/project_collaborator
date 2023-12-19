<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.0-web/scss/fontawesome.scss">
    <style>
        @media (max-width: 576px) {

            th,
            td {
                font-size: 10px;
            }

        }

        .error {
            color: red;
        }

        .hide_id {
            display: none;
        }
    </style>
</head>
<div class="container-fluid ">
    <table class="table table-striped table-inverse table-responsive w-100">
        <h3 class="text-center">LISTE DE COLLABORATEURS</h3>
        <div>
            <a href="#modal_art" id="show_modal_art" class="btn bg-primary text-light" onclick="creer()">Créer</a>
        </div>

        <thead class="thead-inverse bg-dark">
            <tr class=" col bg-primary border">
                <th class=" text-center border bg-primary text-light fw-semibold">CODE</th>
                <th class=" text-center border bg-primary text-light fw-semibold">NOM ET PRENOM</th>
                <th class=" text-center border bg-primary text-light fw-semibold">ADRESSE</th>
                <th class=" text-center border bg-primary text-light fw-semibold">MOBILE</th>
                <th class=" w-25 text-center border bg-primary text-light fw-semibold">ACTION</th>
            </tr>
        </thead>
        <tbody id="tbody_collaborator">
            <?= $rows ?>
        </tbody>

    </table>
    <tfoot>
        <div class="bg-primary text-light">
            <h3 class="text-center">Nombre de COLLABORATEURS: <?= $count ?></h3>
        </div>
    </tfoot>
</div>
<div class="container-fluid">
    <div id="modal_art" class="">
        <div class="modal_art_content">

            <a href=""><i class="fa fa-close fa-2x text-light" id="btn_close"></i></a>
            <div class="row" id="modal_form">
                <!--//! this is form column left -->
                <div class="col-11 col-md-12 col-lg-6" id="col-left">

                    <!-- form input starts from here -->
                    <div class="row text-center d-flex flex-column flex-md-row d-md-flex  justify-content-md-around">
                        <h2 class="text-center form-title">Saisir Collaborateur</h2>
                        <div class="col-6 col-md-8 d-sm-block mt-2" id="civilite">
                            <!--//! ----------Civilite----------- -->
                            <label for="" class="col-12 col-md-3 col-lg-3 fw-bold text-dark">Civilite<span class="error fs-4">*</span></label>
                            <select class="col-8 input p-1" id="civilite" required>
                                <option selected id="civilite">Choisir votre civilite<span class="error fs-4">*</span></option>
                                <option value="monsieur">Monsieur</option>
                                <option value="madame">Madame</option>
                            </select>
                            <div class="hide_id">

                                <label for="nom" class="col-12 col-md-3 fw-bold text-dark my-1" disabled>ID</label>
                                <input class="col-8 input" type="text" id="id" name="id">
                            </div>
                            <!--//! -----------Nom-------------- -->
                            <label for="nom" class="col-12 col-md-3 fw-bold text-dark my-1">Nom<span class="error fs-4">*</span></label>
                            <input class="col-8 input" type="text" id="nom" name="nom">
                            <!--//! -----------------Prenom--------------- -->
                            <label for="prenom" class="col-12 col-md-3 fw-bold text-dark">Prénom<span class="error fs-4">*</span></label>
                            <input class="col-8 input" type="text" id="prenom" name="prenom">
                        </div>
                        <!--//! -----------------Photo COL------------------ -->
                        <div class="col-6 col-md-3 " id="photo">
                            <div class="photo ms-md-auto me-md-3 me-lg-0 ms-lg-5">
                                <img src="image/homme1.jpg" alt="" class="" width="100" height="100">
                            </div>
                            <div class="fichier"><a href="" class="btn btn-sm ms-1 ms-md-5  mt-2  bg-light">
                                    Creer un fichier</a></div>
                        </div>
                        <!--//todo This is form second row -->
                        <div class="second_row mt-3">
                            <!--//! -----------------Datenaissange------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Date naissance<span class="error fs-4">*</span></label>
                                <input type="text" class="col-8 input" id="dateOfBirth" name="dateOfBirth" placeholder="dd/mm/yyyy">
                            </div>
                            <!--//! -----------------Lieu de naissance------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Lieu de naissance<span class="error fs-4">*</span></label>
                                <input type="text" class="col-8 input" id="placeOfBirth" name="placeOfBirth">
                            </div>
                            <!--//! -----------------securitySocial------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">N° Sécu<span class="error fs-4">*</span></label>
                                <input type="text" class="col-8 input" id="socialSecurity" name="socialSecurity">
                            </div>
                            <!--//! -----------------emailPro------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mail Pro</label>
                                <input type="text" class="col-8 input" id="emailPro" name="eemailPro">
                            </div>
                            <!--//! -----------------mailPerso------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mail Perso</label>
                                <input type="text" class="col-8 input" id="mailPer" name="mailPer">
                            </div>
                            <!--//! -----------------mobile------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mobile<span class="error fs-4">*</span></label>
                                <input type="text" class="col-8 input" id="mobile" name="mobile">
                            </div>
                            <!--//! -----------------fixe------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Téléphone fixe</label>
                                <input type="text" class="col-8 input" id="fixe" name="fixe">
                            </div>
                        </div>
                    </div>
                </div>
                <!--//!-----------This is form column right for address----------->
                <div class="col-12 col-md-12 col-lg-6" id="col-right">
                    <h6 class="fw-bold text-dark mt-md-3 mt-4 text-center text-md-center">Adresse</h6>
                    <div class="adresse">
                        <!--//! -----------------rue------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-12 col-md-3 text-dark label">Rue<span class="error fs-4">*</span></label>
                            <input type="text" class="col-12 col-md-8 input" id="rue" name="rue">
                        </div>
                        <!--//! -----------------complement------------------ -->
                        <div class="from-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Complément</label>
                            <input type="text" class="col-8 input" id="complement" name="complement">
                        </div>
                        <!--//! -----------------postalCode------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Code postal<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="postalCode" name="postalCode">
                        </div>
                        <!--//! -----------------ville------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Ville<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="ville" name="ville">
                        </div>
                        <!--//! -----------------department------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Département<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="department" name="department">
                        </div>
                        <!--//! -----------------region------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Région<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="region" name="region">
                        </div>
                        <!--//! -----------------pays------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Pays<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="pays" name="pays">
                        </div>
                        <!--//! -----------------nationalite------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Nationalité<span class="error fs-4">*</span></label>
                            <input type="text" class="col-8 input" id="nationalite" name="nationalite">
                        </div>
                        <!--//! -----------------typeCollab------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Type de collaborateur<span class="error fs-4">*</span></label>
                            <select class="col-8 input p-1" id="typeCollab">
                                <option selected>Choisir votre type de collaborateur</option>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                                <option value="Indépendant">Indépendant</option>
                                <option value="Stagiaire">Stagiaire</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center justify-content-md-around align-items-center" id="form_btn">
                    <a href="" class="col-md-3 col-9  btn bg-green text-light">Annuler</a>
                    <a href="" id="delete_Btn" class="col-md-3 col-9  btn bg-danger text-light">Supprimer</a>
                    <a href="javascript:Enregistrer()" id="save_Btn" class="col-md-3  col-9  btn bg-blue text-light">Enregistrer</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function modifier(collab_id) {
        afficher(collab_id, state = 1);
    }

    function supprimer(collab_id) {
        if (confirm("Voulez vous vraiment supprimer ce Donnée? !!!")) {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'collaborator.php?action=delete');
            let data = new FormData();
            data.append('id', collab_id);
            xhr.send(data);
            xhr.onload = () => {
                let response = xhr.responseText;
                if (xhr.status === 200) {
                    alert(response);
                    location.reload();
                } else {
                    alert("Error");
                }
            };
        }
    }


    function Enregistrer() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'collaborator.php?action=save');
        let data = new FormData();
        data.append('id', id.value);
        data.append('civilite', civilite.value);
        data.append('nom', nom.value);
        data.append('prenom', prenom.value);
        data.append('dateOfBirth', dateOfBirth.value);
        data.append('placeOfBirth', placeOfBirth.value);
        data.append('socialSecurity', socialSecurity.value);
        data.append('emailPro', emailPro.value);
        data.append('mailPer', mailPer.value);
        data.append('mobile', mobile.value);
        data.append('fixe', fixe.value);
        data.append('rue', rue.value);
        data.append('complement', complement.value);
        data.append('postalCode', postalCode.value);
        data.append('ville', ville.value);
        data.append('department', department.value);
        data.append('region', region.value);
        data.append('pays', pays.value);
        data.append('nationalite', nationalite.value);
        data.append('typeCollab', typeCollab.value);
        xhr.send(data);
        xhr.onload = () => {
            let response = xhr.responseText;
            if (xhr.status === 200) {
                alert(response);
            } else {
                alert("Error");
            }
        };
    }


    function chercher() {
        event.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'collaborator.php?action=search');

        let data = new FormData();
        data.append('mot', mot.value); // Corrected typo here

        xhr.send(data);

        xhr.onload = () => {
            let response = xhr.responseText; // Corrected variable name here
            tbody_collaborator.innerHTML = response;
        };
    }

    function afficher(colab_id, state = 0) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'collaborator.php?action=show');
        let data = new FormData();
        data.append('id', colab_id);
        xhr.send(data);
        xhr.onload = () => {
            let response = xhr.responseText;
            response = JSON.parse(response);
            id.value = response.id;
            civilite.value = response.civilite;
            nom.value = response.nom;
            prenom.value = response.prenom;
            dateOfBirth.value = response.dateOfBirth;
            placeOfBirth.value = response.placeOfBirth;
            socialSecurity.value = response.socialSecurity;
            emailPro.value = response.emailPro;
            mailPer.value = response.mailPer;
            mobile.value = response.mobile;
            fixe.value = response.fixe;
            rue.value = response.rue;
            complement.value = response.complement;
            postalCode.value = response.postalCode;
            ville.value = response.ville;
            department.value = response.department;
            region.value = response.region;
            pays.value = response.pays;
            nationalite.value = response.nationalite;
            show_modal_art.click();
            if (state == 0) {
                nom.disabled = true;
                prenom.disabled = true;
                dateOfBirth.disabled = true;
                placeOfBirth.disabled = true;
                socialSecurity.disabled = true;
                emailPro.disabled = true;
                mailPer.disabled = true;
                mobile.disabled = true;
                fixe.disabled = true;
                rue.disabled = true;
                complement.disabled = true;
                postalCode.disabled = true;
                ville.disabled = true;
                department.disabled = true;
                region.disabled = true;
                pays.disabled = true;
                nationalite.disabled = true;
                typeCollab.disabled = true;
                delete_Btn.disabled = true;
                save_Btn.disabled = true;
            } else {
                nom.disabled = false;
                prenom.disabled = false;
                dateOfBirth.disabled = false;
                placeOfBirth.disabled = false;
                securitySocial.disabled = false;
                emailPro.disabled = false;
                mailPer.disabled = false;
                mobile.disabled = false;
                fixe.disabled = false;
                rue.disabled = false;
                complement.disabled = false;
                postalCode.disabled = false;
                ville.disabled = false;
                department.disabled = false;
                region.disabled = false;
                pays.disabled = false;
                nationalite.disabled = false;
                typeCollab.disabled = false;
            }
        }
    }
</script>