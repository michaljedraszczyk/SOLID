from abc import abstractmethod, ABC
from dataclasses import dataclass
from typing import Generic, TypeVar

import xmltodict


SourceT = TypeVar('SourceT', str, dict)


@dataclass
class Article:
    title: str
    link: str
    categories: list[str]
    pub_date: str
    thumbnail_url: str


class BaseLoader(ABC, Generic[SourceT]):
    @abstractmethod
    def load(self, source_data: SourceT) -> Article:
        ...


class JSONLoader(BaseLoader[dict]):
    def load(self, source_data: dict) -> Article:
        return Article(**source_data)


class XMLLoader(BaseLoader[str]):
    def load(self, source_data: str) -> Article:
        return Article(**xmltodict.parse(source_data))
