from abc import ABC, abstractmethod

import boto3
from django.core.mail import EmailMultiAlternatives, get_connection


FROM_EMAIL = 'info@example.com'


class EmailSender(ABC):
    @abstractmethod
    def send(self, subject: str, message: str, receivers: list[str]) -> None:
        ...


class SMTPSender(EmailSender):
    def __init__(self, username: str, password: str) -> None:
        self._conn = get_connection(
            username=username,
            password=password,
            fail_silently=False,
        )

    def send(self, subject: str, message: str, receivers: list[str]) -> None:
        EmailMultiAlternatives(
            subject,
            message,
            FROM_EMAIL,
            receivers,
            connection=self._conn,
        ).send()
        

class SESSender(EmailSender):
    def __init__(self, access_key_id: str, secret_access_key: str) -> None:
        self._client = boto3.client(
            's3',
            aws_access_key_id=access_key_id,
            aws_secret_access_key=secret_access_key,
        )

    def send(self, subject: str, message: str, receivers: list[str]) -> None:
        self._client.send_email(
            Destination={'ToAdresses': receivers},
            Message={
                'Body': {
                    'Text': {
                        'Charset': 'UTF-8',
                        'Data': message,
                    },
                },
                'Subject': {
                    'Charset': 'UTF-8',
                    'Data': subject,
                },
            },
            Source=FROM_EMAIL,
        )



class EmailManager:
    def __init__(self, sender: EmailSender) -> None:
        self._sender = sender

    def send(self, subject: str, message: str, receivers: list[str]) -> None:
        self._sender.send(subject, message, receivers)
