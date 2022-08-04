from abc import ABC, abstractmethod
from datetime import datetime
from dataclasses import dataclass

import boto3


FROM_EMAIL = 'info@example.com'


@dataclass
class Offer:
    title: str
    owner_email: str
    expiration_time: datetime

    def has_expired(self) -> bool:
        return self.expiration_time < datetime.now()


class EmailSender(ABC):
    @abstractmethod
    def send(self, subject: str, message: str, receivers: list[str]) -> None:
        ...


class SESSender:
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


class OffersProcessor:
    def __init__(self, sender: EmailSender) -> None:
        self._sender = sender

    def process(self, offers: list[Offer]) -> None:
        expired = [offer for offer in offers if offer.has_expired()]

        for offer in expired:
            self._sender.send(
                subject="Your offer has expired",
                message=f"Your offer '{offer.title}' has expired.",
                receivers=[offer.owner_email],
            )
