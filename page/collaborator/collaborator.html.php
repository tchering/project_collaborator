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
    </style>
</head>
<div class="container-fluid ">
    <table class="table table-striped table-inverse table-responsive w-100">
        <h3 class="text-center">LISTE DE COLLABORATEURS</h3>
        <div>
            <a href="#modal_art" id="show_modal_art" class="btn bg-primary text-light" onclick="creer()">Créer</a>
        </div>

        <thead class="thead-inverse bg-dark">
            <tr class=" bg-primary border">
                <th class=" text-center border bg-primary text-light fw-semibold">CODE</th>
                <th class="text-center border bg-primary text-light fw-semibold">NOM ET PRENOM</th>
                <th class="text-center border bg-primary text-light fw-semibold">ADRESSE</th>
                <th class="text-center border bg-primary text-light fw-semibold">MOBILE</th>
                <th class="w-25 text-center border bg-primary text-light fw-semibold">ACTION</th>
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
            <h2 class="text-center form-title">Saisir Collaborateur</h2>
            <a href=""><i class="fa fa-close fa-2x text-light" id="btn_close"></i></a>
            <div class="row" id="modal_form">
                <div class="col-12 col-md-12 col-lg-6" id="col-left">
                    <!-- form input starts from here -->
                    <div class="row d-block text-center d-md-flex justify-content-around">
                        <div class="col-8 mt-2" id="civilite">
                            <!--//! ----------Civilite----------- -->
                            <label for="" class="col-12 col-md-3 col-lg-3 fw-bold text-dark">Civilite</label>
                            <select class="col-8 input p-1" id="civilite">
                                <option selected id="civilite">Choisir votre civilite</option>
                                <option value="monsieur">Monsieur</option>
                                <option value="madame">Madame</option>
                            </select>
                            <label for="nom" class="col-12 col-md-3 fw-bold text-dark my-1">ID</label>
                            <input class="col-8 input" type="text" id="id" name="id">
                            <!--//! -----------Nom-------------- -->
                            <label for="nom" class="col-12 col-md-3 fw-bold text-dark my-1">Nom</label>
                            <input class="col-8 input" type="text" id="nom" name="nom">
                            <!--//! -----------------Prenom--------------- -->
                            <label for="prenom" class="col-12 col-md-3 fw-bold text-dark">Prénom</label>
                            <input class="col-8 input" type="text" id="prenom" name="prenom">
                        </div>
                        <!--//! -----------------Photo------------------ -->
                        <div class="col-12 col-md-3" id="photo">
                            <div class="photo ms-md-auto"></div>
                            <div class="fichier"><a href="" class="btn btn-sm  mt-2  bg-light">
                                    Creer un fichier</a></div>
                        </div>
                        <!--//todo This is form second row -->
                        <div class="second_row mt-3">
                            <!--//! -----------------Datenaissange------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Date naissance</label>
                                <input type="text" class="col-8 input" id="dateOfBirth" name="dateOfBirth" placeholder="dd/mm/yyyy">
                            </div>
                            <!--//! -----------------Lieu de naissance------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Lieu de naissance</label>
                                <input type="text" class="col-8 input" id="placeOfBirth" name="placeOfBirth">
                            </div>
                            <!--//! -----------------securitySocial------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">N° Sécu</label>
                                <input type="text" class="col-8 input" id="securitySocial" name="securitySocial">
                            </div>
                            <!--//! -----------------mailPro------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mail Pro</label>
                                <input type="text" class="col-8 input" id="mailPro" name="mailPro">
                            </div>
                            <!--//! -----------------mailPerso------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mail Perso</label>
                                <input type="text" class="col-8 input" id="mailPer" name="mailPer">
                            </div>
                            <!--//! -----------------mobile------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Mobile</label>
                                <input type="text" class="col-8 input" id="mobile" name="mobile">
                            </div>
                            <!--//! -----------------phoneFix------------------ -->
                            <div class="form-group">
                                <label for="" class="col-12 col-md-3 text-dark label">Téléphone fixe</label>
                                <input type="text" class="col-8 input" id="phoneFix" name="phoneFix">
                            </div>
                        </div>
                    </div>
                </div>
                <!--//todo This is for addresse detail -->
                <div class="col-12 col-md-12 col-lg-6" id="col-right">
                    <h6 class="fw-bold text-dark mt-md-3 mt-4">Adresse</h6>
                    <div class="adresse">
                        <!--//! -----------------rue------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-12 col-md-3 text-dark label">Rue</label>
                            <input type="text" class="col-12 col-md-8 input" id="rue" name="rue">
                        </div>
                        <!--//! -----------------complement------------------ -->
                        <div class="from-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Complément</label>
                            <input type="text" class="col-8 input" id="complement" name="complement">
                        </div>
                        <!--//! -----------------codePostal------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Code postal</label>
                            <input type="text" class="col-8 input" id="codePostal" name="codePostal">
                        </div>
                        <!--//! -----------------ville------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Ville</label>
                            <input type="text" class="col-8 input" id="ville" name="ville">
                        </div>
                        <!--//! -----------------department------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Département</label>
                            <input type="text" class="col-8 input" id="department" name="department">
                        </div>
                        <!--//! -----------------region------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Région</label>
                            <input type="text" class="col-8 input" id="region" name="region">
                        </div>
                        <!--//! -----------------pays------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Pays</label>
                            <input type="text" class="col-8 input" id="pays" name="pays">
                        </div>
                        <!--//! -----------------nationalite------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Nationalité</label>
                            <input type="text" class="col-8 input" id="nationalite" name="nationalite">
                        </div>
                        <!--//! -----------------typeCollab------------------ -->
                        <div class="form-group">
                            <label for="" class="col-12 col-md-3 text-dark label">Type de collaborateur</label>
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
                <div class="row d-flex justify-content-between align-items-center">
                    <a href="" class="col-md-3 col-sm-8  btn bg-green text-light">Annuler</a>
                    <a href="" id="deleteBtn" class="col-md-3 col-sm-8  btn bg-danger text-light">Supprimet</a>
                    <a href="javascript:Enregistrer()" id="saveBtn" class="col-md-3 col-sm-8  btn bg-blue text-light">Enregistrer</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function modifier(collab_id) {
        afficher(collab_id, state = 1);
    }

    function Enregistrer() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'collaborator.php?action=save');
        let data = new FormData();
        data.append('id',id.value);
        data.append('civilite', civilite.value);
        data.append('nom', nom.value);
        data.append('prenom', prenom.value);
        data.append('dateOfBirth', dateOfBirth.value);
        data.append('placeOfBirth', placeOfBirth.value);
        data.append('securitySocial', securitySocial.value);
        data.append('mailPro', mailPro.value);
        data.append('mailPer', mailPer.value);
        data.append('mobile', mobile.value);
        data.append('phoneFix', phoneFix.value);
        data.append('rue', rue.value);
        data.append('complement', complement.value);
        data.append('codePostal', codePostal.value);
        data.append('ville', ville.value);
        data.append('department', department.value);
        data.append('region', region.value);
        data.append('pays', pays.value);
        data.append('nationalite', nationalite.value);
        data.append('typeCollab', typeCollab.value);
        xhr.send(data);
        xhr.onload = () => {
            let response = xhr.responseText;
            // alert("success");
            alert(response);
        }
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
            civilite.value = response.civilite;
            nom.value = response.nom;
            prenom.value = response.prenom;
            dateOfBirth.value = response.dateOfBirth;
            placeOfBirth.value = response.placeOfBirth;
            securitySocial.value = response.securitySocial;
            mailPro.value = response.mailPro;
            mailPer.value = response.mailPer;
            mobile.value = response.mobile;
            phoneFix.value = response.phoneFix;
            rue.value = response.rue;
            complement.value = response.complement;
            codePostal.value = response.codePostal;
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
                securitySocial.disabled = true;
                mailPro.disabled = true;
                mailPer.disabled = true;
                mobile.disabled = true;
                phoneFix.disabled = true;
                rue.disabled = true;
                complement.disabled = true;
                codePostal.disabled = true;
                ville.disabled = true;
                department.disabled = true;
                region.disabled = true;
                pays.disabled = true;
                nationalite.disabled = true;
                typeCollab.disabled = true;
            } else {
                nom.disabled = false;
                prenom.disabled = false;
                dateOfBirth.disabled = false;
                placeOfBirth.disabled = false;
                securitySocial.disabled = false;
                mailPro.disabled = false;
                mailPer.disabled = false;
                mobile.disabled = false;
                phoneFix.disabled = false;
                rue.disabled = false;
                complement.disabled = false;
                codePostal.disabled = false;
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