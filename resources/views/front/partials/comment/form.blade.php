<form method="post" action="{{ route('front.form.comment') }}">
    {!! getCommentInputs($post) !!}
    <div class="row">
        {!! nonCache('mail_alerts') !!}
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="İsim Soyisim" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-control" name="email" type="text" placeholder="E-Posta" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <textarea class="form-control" name="message" rows="3" placeholder="Mesajınız"></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">
                Yorum Yap
            </button>
        </div>
    </div>
</form>
