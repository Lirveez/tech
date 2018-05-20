import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.*;
import java.util.stream.Collectors;

public class CurrencyObserver implements Runnable {
    public static final int DELAY = 5000;
    private static final CurrencyObserver instance = new CurrencyObserver();

    private final List<CurrencyListener> listeners = Collections.synchronizedList(new LinkedList<>());
    private final Map<String, Double> currencies = new TreeMap<>();
    private CurrencyObserver()
    {
        Thread t = new Thread(this);
        t.start();
    }
    public void addListener(CurrencyListener l)
    {
        this.listeners.add(l);
        l.onChangeCurrencies(currencies);
    }
    public void removeListener(CurrencyListener l)
    {
        this.listeners.remove(l);
    }


    private String getCurrencies() throws IOException {
        String url = "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,EUR,USD,LTC&tsyms=RUR";

        URL obj = new URL(url);
        HttpURLConnection connection = (HttpURLConnection) obj.openConnection();

        connection.setRequestMethod("GET");

        BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
        String inputLine;
        StringBuilder response = new StringBuilder();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }

        in.close();
        return response.toString();
    }

    @Override
    public void run() {
        while (true)
        {
            try {
                String json = getCurrencies();
                Map<?, ?> JSONMap = JSON.parseObject(json, Map.class);
                Map<String, Double> map =
                        JSONMap.entrySet().stream().map(entry ->
                        {
                            String key = entry.getKey().toString();
                            Double value = ((JSONObject) entry.getValue()).getDoubleValue("RUR");
                            return new AbstractMap.SimpleEntry<>(key, value);
                        }).filter(e -> !e.getValue().equals(currencies.get(e.getKey()))).
                                collect(Collectors.toMap(Map.Entry::getKey, Map.Entry::getValue));
                if (!map.isEmpty()) {
                    listeners.forEach(currencyListener -> currencyListener.onChangeCurrencies(map));
                    map.forEach(currencies::put);
                }

                Thread.sleep(DELAY);
            } catch (IOException|InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public static CurrencyObserver getInstance() {
        return instance;
    }
}
