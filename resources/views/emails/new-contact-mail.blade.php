
<div class="container mt-4 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="container border-form rounded-2">
                    <div class="mailtrap-logo">
                        <img class="img-fluid" src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png" alt="Deliveboo">
                    </div>
                    <h1>
                        Ciao admin!
                    </h1>

                    <p>
                        Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
                        Nome: {{ $lead->name }}<br>
                        Email: {{ $lead->email }}<br>
                        Messagio:<br>
                        {{ $lead->message }}
                    </p>
                </div
        </div>
    </div>

</div>
