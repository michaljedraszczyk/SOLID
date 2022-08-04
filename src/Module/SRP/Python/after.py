import json
from dataclasses import asdict, dataclass

import aioredis
from fastapi import status

EXPIRATION_TIME = 60 * 60 * 24 * 3


class ArticlesRequestFailedError(Exception):
    ...


@dataclass
class Article:
    title: str
    link: str
    categories: list[str]
    pub_date: str
    thumbnail_url: str


class ArticlesService(BaseHTTPService):
    def __init__(self, url: str) -> None:
        super().__init__()
        self._url = url

    async def get_list(self) -> list[Article]:
        async with self.session.get(self._url) as response:
            if response.status != status.HTTP_200_OK:
                raise ArticlesRequestFailedError
            response_json = await response.json()

            return [Article(**article_data) for article_data in response_json]


class ArticlesCacher:
    def __init__(self, url: str) -> None:
        self._url = url

    async def cache(self, articles: list[Article]) -> None:
        redis = await aioredis.from_url(self._url)

        for article in articles:
            await redis.set(article.title, json.dumps(asdict(article)))

        await redis.close()
