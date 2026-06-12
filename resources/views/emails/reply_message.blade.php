<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <p>Halo {{ $contactMessage->name }},</p>
    
    <p>Terima kasih telah menghubungi Portal Berita. Berikut adalah balasan dari tim kami terkait pesan Anda:</p>
    
    <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #cc1a1a; margin: 20px 0;">
        {!! nl2br(e($replyText)) !!}
    </div>
    
    <p>Pesan asli Anda:</p>
    <blockquote style="color: #666; border-left: 3px solid #ccc; padding-left: 10px; margin-left: 0;">
        <i>"{{ $contactMessage->message }}"</i>
    </blockquote>
    
    <br>
    <p>Salam hangat,<br>
    <strong>Tim Portal Berita</strong></p>
</body>
</html>
