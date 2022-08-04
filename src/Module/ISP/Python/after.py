from abc import ABC, abstractmethod


class WriteableConnection(ABC):
    @abstractmethod
    def put(self, data: dict) -> None:
        ...


class ReadableConnection(ABC):
    @abstractmethod
    def fetch(self) -> None:
        ...


class Connection(WriteableConnection, ReadableConnection):
    def put(self, data: dict) -> None:
        print(f"PUT: {data}")

    def fetch(self) -> None:
        print("FETCH")


class ReadonlyConnection(ReadableConnection):
    def fetch(self) -> None:
        print("FETCH")
