from dataclasses import dataclass

import xmltodict


@dataclass
class Article:
    title: str
    link: str
    categories: list[str]
    pub_date: str
    thumbnail_url: str


class Loader:
    def from_json(self, source_data: dict) -> Article:
        return Article(**source_data)

    def from_xml(self, source_data: str) -> Article:
        return Article(**xmltodict.parse(source_data))
