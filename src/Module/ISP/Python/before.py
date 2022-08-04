from abc import ABC, abstractmethod


class OperationForbiddenError(Exception):
    ...


class BaseConnection(ABC):
    @abstractmethod
    def put(self, data: dict) -> None:
        ...

    @abstractmethod
    def fetch(self) -> None:
        ...


class Connection(BaseConnection):
    def put(self, data: dict) -> None:
        print(f"PUT: {data}")

    def fetch(self) -> None:
        print("FETCH")


class ReadonlyConnection(BaseConnection):
    def put(self, data: dict) -> None:
        raise OperationForbiddenError

    def fetch(self) -> None:
        print("FETCH")
