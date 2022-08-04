import os
from abc import ABC, abstractmethod
from enum import Enum

import boto3
from django.core.mail import EmailMultiAlternatives, get_connection


FROM_EMAIL = 'info@example.com'


class EmailBackend(Enum):
    SMTP = 'smtp'
    SES = 'ses'


class EmailSender(ABC):
    @abstractmethod
    def send(
        self,
        subject: str,
        message: str,
        receivers: list[str],
        username: str,
        password: str,
    ) -> None:
        ...


class SMTPSender(EmailSender):
    def send(
        self,
        subject: str,
        message: str,
        receivers: list[str],
        username: str | None,
        password: str | None,
    ) -> None:
        connection = get_connection(
            username=username,
            password=password,
            fail_silently=False,
        )
        
        EmailMultiAlternatives(
            subject,
            message,
            FROM_EMAIL,
            receivers,
            connection=connection,
        ).send()


class SESSender(EmailSender):
    def send(
        self,
        subject: str,
        message: str,
        receivers: list[str],
        access_key_id: str | None,
        secret_access_key: str | None,
    ) -> None:
        client = boto3.client(
            's3',
            aws_access_key_id=access_key_id,
            aws_secret_access_key=secret_access_key,
        )

        client.send_email(
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


def send_mail(subject: str, message: str, receivers: list[str], backend: EmailBackend) -> None:
    match backend:
        case EmailBackend.SMTP:
            SMTPSender().send(
                subject=subject,
                message=message,
                receivers=receivers,
                username=os.getenv('SMTP_USERNAME'),
                password=os.getenv('SMTP_PASSWORD'),
            )

        case EmailBackend.SES:
            SESSender().send(
                subject=subject,
                message=message,
                receivers=receivers,
                access_key_id=os.getenv('AWS_ACCESS_KEY'),
                secret_access_key=os.getenv('AWS_SECRET_KEY'),
            )
