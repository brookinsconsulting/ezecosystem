if (req.http.host ~ "ezecosystem" || req.http.host ~ "ezpublishlegacy") {
    set req.http.X-force-proto = "https";
}
